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
     * @var String $taskName
     */
    private $taskName;

    /**
     * SubmissionData constructor.
     * @param Submission $submission
     * @param TaskData $taskData
     */
    public function __construct(Submission $submission, String $taskName)
    {
        $this->submission = $submission;
        $this->taskName = $taskName;
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
            'taskName' => $this->taskName
        ];
        // Remove unwanted
        unset($arr['submission']['task']);
        unset($arr['submission']['user']);
        return json_encode($arr);
    }

}