<?php

namespace App\Repositories;

use DB;

class TaskRepository implements TaskRepositoryInterface
{
    protected $table = 'tasks';
    // private $task;

    // public function __construct(Task $task)
    // {
    //     $this->task = $task;
    // }
//IDでとってくるとかならfindById
    public function findAllTasks()
    {
        return DB::table($this->table)->get();
    }

    public function insert($tasks)
    {
        return DB::table($this->table)->insert([
            'title' => $tasks->title,
            'content' => $tasks->content,
            'deadline' => $tasks->deadline,
            'importance' => $tasks->importance,
            'status' => $tasks->status,
            'completion_flg' => false
        ]);
    }

    public function delete($id)
    {
        \Log::debug($id);
       return DB::table($this->table)->where('id', $id)->delete();
    }


    public function findById($id)
    {
        return DB::table($this->table)->find($id);
    }

    public function update($task)
    {
        return DB::table($this->table)->where('id', $task->id)->update([
            'title' => $task->title,
            'content' => $task->content,
            'deadline' => $task->deadline,
            'importance' => $task->importance,
            'status' => $task->status,
            'completion_flg' => false
        ]);
    }

    public function search($task)
    {
        \Log::debug($task);

        $searchedTask = DB::table($this->table)
        ->when(!empty($task->title), function ($query) use ($task) {
            \Log::debug($task->title);
            return $query->where('title', 'like', '%'.$task->title.'%');
        })
        ->when(!empty($task->deadline), function ($query) use ($task) {
            \Log::debug($task->deadline);
            return $query->where('deadline', 'like', '%'.$task->deadline.'%');
        })
        ->when($task->importance != null, function ($query) use ($task) {
            \Log::debug($task->importance);
            return $query->where('importance', $task->importance);
        })
        ->when($task->status != null, function ($query) use ($task) {
            \Log::debug($task->status);
            return $query->where('status', $task->status);
        })
        ->get();
        \Log::debug($searchedTask);

        return $searchedTask;



    }

}
