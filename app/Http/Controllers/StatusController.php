<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
use Illuminate\Http\Request;

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
        $submissions = $query->paginate(10);
        return view('skoi.status')->with('submissions', $submissions);
    }
}
