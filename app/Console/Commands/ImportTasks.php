<?php

namespace App\Console\Commands;

use App\Judge\Task;
use Illuminate\Console\Command;

class ImportTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:import {taskName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import task into database';

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
        $tasks = explode(',', $this->argument('taskName', ''));
        foreach ($tasks as $task) {
            $t = new Task();
            $t->code_name = $task;
            $t->save();
        }
        $this->info('Task imported!');
    }
}
