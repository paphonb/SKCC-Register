<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::where('user_id', Auth::user()->id)->get();
        return view('skoi.message')->with('messages', $messages);
    }

    public function postMessage(Request $request)
    {
        $msg = $request->get('message');
        if (empty($msg))
            return response()->redirectToRoute('message')->with('alert-type', 'danger')->with('message', 'Empty message!');
        $message = new Message();
        $message->message = $msg;
        $message->user_id = Auth::user()->id;
        $message->response = "Waiting for response";
        $message->save();
        return response()->redirectToRoute('message')->with('alert-type', 'success')->with('message', 'Message submitted!');
    }
}
