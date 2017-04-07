<?php

namespace App\Http\Controllers;

use App\Judge\Contest;
use App\Judge\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ContestController extends Controller
{

    private $contests;

    /**
     * ContestController constructor.
     * @param Contest $contests
     */
    public function __construct(Contest $contests)
    {
        $this->middleware('auth');
        $this->contests = $contests;
    }

    public function index()
    {
        $contests = $this->contests->all();
        return response()->json([
            'success' => true,
            'contests' => $contests
        ]);
    }

    public function view($id, Request $request)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        if (Gate::denies('access-contest', $contest)) {
            return response()->json([
                'success' => false
            ]);
        }
        $tasks = $contest->tasks()->where('contest_id', $contest->id)->get();
        foreach ($tasks as $idx => $task) {
            $task['last'] = Submission::where('task_id', $task->id)->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();
        }
        return response()->json([
            'success' => true,
            'contest' => $contest,
            'tasks' => $tasks
        ]);
    }

    public function enter($id)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        $contest->users()->attach(Auth::user()->id);
        return response()->redirectToRoute('contest');
    }

    public function leave($id)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        $contest->users()->detach(Auth::user()->id);
        return response()->redirectToRoute('contest');
    }

    public function scoreboard($id)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        $scoreboardArr = $this->computeNormalScore($contest);
        return view('skoi.scoreboard')->with('contest', $contest)->with('scoreboardArr', $scoreboardArr);
    }

    private function computeNormalScore($contest)
    {
        $scoreboardArr = [];
        foreach ($contest->users as $user) {
            // init
            $usr = new stdClass;
            $scoreboardArr[] = $usr;
            $sum = [];
            // name field
            $usr->name = $user->name;
            // tasks field
            $usr->tasks = [];
            foreach ($contest->tasks as $task) {
                $tsk = new stdClass;
                $sum[] = $tsk;
                $usr->tasks[] = $tsk;
                // calc diff
                $before = Carbon::parse($contest->end)->subHours(1)->toDateTimeString();
                $sub = Submission::where('user_id', $user->id)
                    ->where('task_id', $task->id)
                    //->whereBetween('created_at', [$before, $contest->end])
                    ->orderBy('updated_at', 'desc')
                    ->first();
                if (isset($sub->score)) {
                    $tsk->score = $sub->score;
                } else {
                    $tsk->score = '-';
                }
                // calculate color
                if (isset($sub->result) && $sub->result === 'compilation error') {
                    $tsk->class = 'warning';
                } else if ($tsk->score === '-') {
                    $tsk->class = '';
                } else if ($tsk->score < 100) {
                    $tsk->class = 'danger';
                } else if ($tsk->score == 100) {
                    $tsk->class = 'success';
                } else {
                    $tsk->class = '';
                }
            }
            // sum field
            $usr->score = collect($sum)->sum(function ($tsk) {
                return $tsk->score === '-' ? 0 : $tsk->score;
            });
        }
        return collect($scoreboardArr)->sortByDesc('score')->values()->all();
    }

    private function computeCrazyScore($contest)
    {

    }
}
