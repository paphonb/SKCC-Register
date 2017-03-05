<?php

namespace App\Http\Controllers;

use App\Judge\Contest;
use Illuminate\Support\Facades\Auth;

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

    public function view($id)
    {
        $contest = $this->contests->where('id', $id)->firstOrFail();
        $tasks = $contest->tasks->all();
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
}
