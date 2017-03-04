<?php

namespace App\Judge;


/**
 * Represent task json file as object
 * @package App\Judge
 */
class TaskModel
{

    private $json;

    /**
     * Task constructor.
     * @param mixed $jsonData json for task model construction
     */
    public function __construct($jsonData)
    {
        $this->json = $jsonData;
    }

    /**
     * Full name for this task
     * @return mixed
     */
    public function name()
    {
        return $this->json->name;
    }

    /**
     * Short name for this task, should contains only a-z,0-9,_
     * @return string
     */
    public function codeName()
    {
        return $this->json->codeName;
    }

    /**
     * Time limit in milliseconds
     * @return integer
     */
    public function timeLimit()
    {
        return $this->json->timeLimit;
    }

    /**
     * Memory limit, in Kilobytes
     * @return integer
     */
    public function memoryLimit()
    {
        return $this->json->memoryLimit;
    }

    /**
     * Description or problem statements
     * @return string
     */
    public function description()
    {
        return $this->json->description;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->json->type;
    }

    /**
     * Group rule
     * @return array
     */
    public function groupRule()
    {
        return $this->json->type;
    }

    /**
     * Source validator program
     * ex. checker.cpp
     * @return string
     */
    public function sourceValidator()
    {
        return $this->json->sourceValidator;
    }

    /**
     * Output validator program
     * @return string
     */
    public function outputValidator()
    {
        return $this->json->outputValidator;
    }

    public function json()
    {
        return $this->json;
    }


}