<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Judge\Submission;
use App\Judge\SubmissionMessage;

class RejudgeSubmission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'submission:rejudge {submissionid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rejudge a task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $submissionid = $this->argument('submissionid');
        $submission = Submission::find($submissionid);
        if ($submission != null) {
            $this->info('Found submission #' . $submission->id);
            //if ($this->confirm('Do you wish to continue?')) {
                $msg = new SubmissionMessage($submission);
                $msg->send();
                $this->info('Request sent!');
            //}
        } else {
            $this->error('Submission #' . $submissionid . ' not found');
        }
    }
}
