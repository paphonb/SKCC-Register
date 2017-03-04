<?php

namespace App\Judge;

use Mookofe\Tail\Facades\Tail;

/**
 * Class Submission
 * Handling user submitted code and grading task
 * @package App\Judge
 */
class SubmissionMessage
{

    /**
     * Submission model
     * @var Submission $submission
     */
    private $submission;

    /**
     * @var string $queueName
     */
    private $queueName;

    /**
     * Submission constructor.
     * @param Submission $submission
     * @param string $queueName
     */
    public function __construct(Submission $submission, $queueName = 'judge')
    {
        $this->submission = $submission;
        $this->queueName = $queueName;
    }

    public function send()
    {
        $data = new SubmissionData(
            $this->submission,
            new TaskData($this->submission->task->code_name)
        );
        $json = $data->jsonString();
        Tail::add($this->queueName, $json, [
            'content_type' => 'application/json'
        ]);
    }

}