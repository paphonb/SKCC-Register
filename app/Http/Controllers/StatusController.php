<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    private $submission;

    public function __construct(Submission $submission)
    {
        $this->middleware('auth');
        $this->submission = $submission;
    }

    public function index(Request $request)
    {
        $query = $this->submission->orderBy('updated_at', 'desc')->with(['user', 'task'])->select([
            'id', 'user_id', 'task_id', 'result', 'score', 'compiler_message', 'time', 'memory', 'created_at'
        ]);
        // filter frozen
        // query exclusion list
        $exclusions = DB::table('submissions_freeze')->get();
        foreach ($exclusions as $ex) {
            $query->whereNotBetween('created_at', [$ex->start, $ex->end]);
        }
        if (count($exclusions) > 0)
            $query->orWhere('user_id', Auth::user()->id);
        $submissions = $query->paginate(10);
        if ($request->headers->get('accept') == 'application/json') {
            return response()->json([
                'success' => true,
                'submissions' => $submissions
            ]);
        } else {
            return view('skoi.status')->with('submissions', $submissions);
        }
    }

    public function next(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(config('judge.baseurl') . config('judge.nexturl'));
        return response()->json([
            'success' => true
        ]);
    }
}
