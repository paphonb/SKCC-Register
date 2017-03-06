<?php

namespace App\Http\Controllers;

use App\Judge\Contest;
use App\Judge\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $contest = $this->contests->all();
        return view('skoi.contest')->with('contests', $contest);
    }

    public function view($id, Request $request)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        if (Gate::denies('access-contest', $contest)) {
            return response()->redirectToRoute('contest');
        }
        $tasks = $contest->tasks()->where('contest_id', $contest->id)->get();
        return view('skoi.contestview')->with('contest', $contest)->with('tasks', $tasks);
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
        $submissions = Submission::query();
        return view('skoi.scoreboard')->with('contest', $contest)->with('submissions', $submissions);
    }

    private function computeNormalScore($id)
    {

    }
}
