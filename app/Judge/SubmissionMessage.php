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
            $this->submission->task->code_name
        );
        $json = $data->jsonString();

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', config('judge.baseurl') . config('judge.submiturl'), [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => $json
        ]);
    }

}