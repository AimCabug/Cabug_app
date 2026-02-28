<?php

namespace App\Services;

class TaskService{
    private $task;

    public function add ($name) {
        return $this->task[] = $name;
    }

    public function getAllTasks() {
        return $this->task;
    }
}