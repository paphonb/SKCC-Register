<?php

namespace App\Http\Controllers;

use App\Judge\Contest;

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
    }

    public function enter($id)
    {

    }

    public function leave($id)
    {

    }
}
