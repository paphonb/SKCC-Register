<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
use Illuminate\Http\Request;

class JudgeResultController extends Controller
{
    private $status = ["!IP" => "in progress", "!JE" => "judge error", "!CE" => "compilation error"];

    public function progress(Request $request)
    {
        $sub = Submission::where('id', $request->get('id'))->first();
        $sub->result = $this->status[$request->get('status')] ?? $sub->result;
        $sub->compiler_message = $request->get('compilerMessage') ?? '';
        $sub->save();
        return response()->json(['status' => 'ok', 'action' => 'notify-progress']);
    }

    public function submit(Request $request)
    {
        
        $sub = Submission::where('id', $request->get('id'))->first();
        $sub->result = $request->get('result');
        $sub->compiler_message = $request->get('compilerMessage') ?? '';
        $sub->time = (int)$request->get('time');
        $sub->memory = (int)$request->get('memory');
        $sub->score = (int)(((int)$request->get('passed')) * 100.0 / ((int)$request->get('total')));
        $sub->save();
        // Calculate new score
        // TODO: Find it's contest and update score
        return response()->json(['status' => 'ok', 'action' => 'submit']);
    }
}
