<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function showTask()
    {
        return $this->taskRepository->findAllTasks();
    }

    public function addTask($tasks)
    {
        return $this->taskRepository->insert($tasks);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }

    public function findTask($id)
    {
        return $this->taskRepository->findById($id);
    }

    public function save($editTask)
    {
        return $this->taskRepository->update($editTask);
    }

    public function search($searchTask)
    {
        \Log::debug($searchTask);

        return $this->taskRepository->search($searchTask);
    }
}
