<?php

namespace App\Http\Controllers;

use App\Judge\Submission;
use App\Judge\SubmissionMessage;
use App\Judge\Task;
use App\Judge\TaskData;
use App\Judge\TaskModel;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
            $tm = new TaskModel((new TaskData($task->code_name))->data());
            $arr[$idx]['code_name'] = $task->code_name;
            $arr[$idx]['name'] = $tm->name();
            $arr[$idx]['time_limit'] = $tm->timeLimit();
            $arr[$idx]['memory_limit'] = $tm->memoryLimit();
        }
        return view('skoi.task')->with('tasks', $arr);
    }

    public function description($codeName)
    {
        $file = "tasks/" . $codeName . "/task.pdf";
        if (Storage::exists($file)) {
            return response()->download(storage_path('app/' . $file), $codeName . ".pdf", [
                'Content-Type: application/pdf'
            ]);
        } else {
            throw new NotFoundHttpException();
        }

    }

    public function getSubmit($codeName)
    {
        $exampleCode = '';
        if (Storage::exists('example.cpp'))
            $exampleCode = Storage::get('example.cpp');
        return view('skoi.submit')
            ->with('exampleCode', $exampleCode)
            ->with('codeName', $codeName);
    }

    public function postSubmit($codeName, Request $request)
    {
        $task = $this->task->where('code_name', $codeName)->firstOrFail();
        $code = $request->get('sourceCode');
        if (empty($code))
            return view('skoi.submit')
                ->with('error', true)
                ->with('errorMessage', 'Empty source code!')
                ->with('exampleCode', $code)
                ->with('codeName', $codeName);
        // add record to db
        $submission = new Submission();
        $submission->user_id = Auth::user()->id;
        $submission->task_id = $task->id;
        $submission->source_code = $code;
        $submission->compiler_message = '';
        $submission->language = $this->langMap[$request->get('language') ?? 0];
        $submission->save();
        // send to queue
        $msg = new SubmissionMessage($submission);
        $msg->send();
        // redirect to home
        return response()->redirectToRoute('task');
    }
}
