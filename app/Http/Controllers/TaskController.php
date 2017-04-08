<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
use App\Judge\SubmissionMessage;
use App\Judge\Task;
use App\Judge\TaskData;
use App\Judge\TaskModel;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskController extends Controller
{

    /**
     * Language mapping
     * @var array
     */
    private $langMap = [
        '1' => 'cpp', '2' => 'py', '3' => 'java'
    ];

    /**
     * @var Task
     */
    private $task;

    /**
     * @var Filesystem
     */
    private $storage;

    /**
     * TaskController constructor.
     * @param Task $task
     * @param Filesystem $storage
     */
    public function __construct(Task $task, Filesystem $storage)
    {
        $this->middleware('auth');
        $this->task = $task;
        $this->storage = $storage;
    }

    public function index(Request $request)
    {
        $arr = [];
        $tasks = $this->task->all();
        foreach ($tasks as $idx => $task) {
            $arr[$idx]['code_name'] = $task->code_name;
            $arr[$idx]['name'] = $task->display_name;
            $arr[$idx]['last'] = Submission::where('task_id', $task->id)->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();
        }
        return view('skoi.task')->with('tasks', $arr);
    }

    public function description($codeName)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', config('judge.baseurl') . config('judge.descurl') . '/' . $codeName);
        return response($res->getBody())
            ->header('Content-Type', $res->getHeader('Content-Type'));
    }

    public function view($codeName, Request $request)
    {
        $task = $this->task->where('code_name', $codeName)->firstOrFail();
        $query = Submission::where('user_id', Auth::user()->id)->where('task_id', $task->id)->orderBy('updated_at', 'desc');
        $submissions = $query->paginate(5);
        if ($request->headers->get('accept') == 'application/json') {
            return response()->json([
                'success' => true,
                'codeName' => $codeName,
                'submissions' => $submissions
            ]);
        } else {
            return view('skoi.taskview')->with('codeName', $codeName)->with('submissions', $submissions);
        }
    }

    public function getSubmit($codeName, Request $request)
    {
        $exampleCode = '';
        if (Storage::exists('example.cpp'))
            $exampleCode = Storage::get('example.cpp');
        $redirect = ['redirect' => $request->get('redirect'), 'value' => $request->get('value')];
        return view('skoi.submit')
            ->with('exampleCode', $exampleCode)
            ->with('codeName', $codeName)
            ->with('redirect', $redirect);
    }

    public function postSubmit($codeName, Request $request)
    {
        $task = $this->task->where('code_name', $codeName)->firstOrFail();
        $code = $request->get('sourceCode');
        if (empty($code)) {
            if ($request->headers->get('accept') == 'application/json') {
                return response()->json([
                    'success' => false,
                    'error' => 'Empty source code'
                ]);
            } else {
                return view('skoi.submit')
                    ->with('error', true)
                    ->with('errorMessage', 'Empty source code!')
                    ->with('exampleCode', $code)
                    ->with('codeName', $codeName);
            }
        }
        // add record to db
        $submission = new Submission();
        $submission->user_id = Auth::user()->id;
        $submission->task_id = $task->id;
        $submission->source_code = $code;
        $submission->compiler_message = '';
        $submission->language = $this->langMap['1'];
        $submission->save();
        // send to queue
        $msg = new SubmissionMessage($submission);
        $msg->send();
        // redirect to home
        if ($request->headers->get('accept') == 'application/json') {
            return response()->json([
                'success' => true
            ]);
        } else {
            if ($request->has('redirect-target')) {
                return redirect()->route('contest-view', ['id' => $request->get('redirect-target')]);
            } else
                return response()->redirectToRoute('task');
        }
    }
}
