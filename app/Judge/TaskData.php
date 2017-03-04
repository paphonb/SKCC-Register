<?php

namespace App\Judge;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class TaskData
{
    const TASK_FILE_NAME = 'task.json';
    const TASK_FOLDER = 'tasks';
    private $codeName;

    /**
     * TaskFile constructor.
     * @param string $codeName
     */
    public function __construct($codeName)
    {
        $this->codeName = $codeName;
    }

    public function exists()
    {
        return Storage::exists(
            self::TASK_FOLDER . "/" . $this->codeName . "/" . self::TASK_FILE_NAME);
    }

    public function data($arr = false)
    {
        $file = self::TASK_FOLDER . '/' . $this->codeName . '/' . self::TASK_FILE_NAME;
        $json = json_decode(Storage::get($file), $arr);
        if (!isset($json))
            throw new \Exception('Invalid JSON format in task description of ' . $this->codeName);
        return $json;
    }
}