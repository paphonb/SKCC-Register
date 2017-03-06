<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
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

    public function index()
    {
        $query = $this->submission->orderBy('updated_at', 'desc');
        // filter frozen
        // query exclusion list
        $exclusions = DB::table('submissions_freeze')->get();
        foreach ($exclusions as $ex) {
            $query->whereNotBetween('created_at', [$ex->start, $ex->end]);
        }
        if (count($exclusions) > 0)
            $query->orWhere('user_id', Auth::user()->id);
        return view('skoi.status')->with('submissions', $query->paginate(10));
    }
}
