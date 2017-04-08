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

    public function index(Request $request)
    {
        $messages = Message::where('user_id', Auth::user()->id)->get();
        if ($request->headers->get('accept') == 'application/json') {
            return response()->json([
                'success' => true,
                'messages' => $messages
            ]);
        } else {
            return view('skoi.message')->with('messages', $messages);
        }
    }

    public function postMessage(Request $request)
    {
        $msg = $request->get('message');
        if (empty($msg)) {
            if ($request->headers->get('accept') == 'application/json') {
                return response()->json([
                    'success' => false,
                    'error' => 'Empty message'
                ]);
            } else {
                return response()->redirectToRoute('message')->with('alert-type', 'danger')->with('message', 'Empty message!');
            }
        }
        $message = new Message();
        $message->message = $msg;
        $message->user_id = Auth::user()->id;
        $message->response = "Waiting for response";
        $message->save();
        if ($request->headers->get('accept') == 'application/json') {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->redirectToRoute('message')->with('alert-type', 'success')->with('message', 'Message submitted!');
        }
    }
}
