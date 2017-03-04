<?php

namespace App\Judge;


use Illuminate\Support\Facades\Storage;

class SubmissionData
{
    /**
     * @var Submission $submission
     */
    private $submission;

    /**
     * @var TaskData $taskModel
     */
    private $taskData;

    /**
     * SubmissionData constructor.
     * @param Submission $submission
     * @param TaskData $taskData
     */
    public function __construct(Submission $submission, TaskData $taskData)
    {
        $this->submission = $submission;
        $this->taskData = $taskData;
    }

    /**
     * Encoded json string for submission data
     * @return string
     */
    public function jsonString()
    {
        $arr = [
            'user' => $this->submission->user->name,
            'apiToken' => $this->submission->user->api_token,
            'submission' => $this->submission->toArray(),
            'taskModel' => $this->taskData->data(true),
            'taskSupply' => [
                'input' => [],
                'solution' => [],
                'validator' => [
                    'sourceCode' => '',
                    'output' => ''
                ]
            ]
        ];
        // Remove unwanted
        unset($arr['submission']['task']);
        unset($arr['submission']['user']);
        $baseFolder = 'tasks/' . $this->submission->task->code_name;
        foreach (Storage::directories($baseFolder) as $dir) {
            $files = Storage::files($dir);
            $arr['taskSupply']['input'][] = Storage::get($files[0]);
            $arr['taskSupply']['solution'][] = Storage::get($files[1]);
        }
        if (Storage::exists($baseFolder . '/' . 'sourceValidator.cpp'))
            $arr['taskSupply']['validator']['sourceCode'] = Storage::get(
                $baseFolder . '/' . 'sourceValidator.cpp');
        if (Storage::exists($baseFolder . '/' . 'outputValidator.cpp'))
            $arr['taskSupply']['validator']['output'] = Storage::get(
                $baseFolder . '/' . 'outputValidator.cpp');
        return json_encode($arr);
    }

}