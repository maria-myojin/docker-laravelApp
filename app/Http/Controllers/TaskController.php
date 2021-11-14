<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;
    protected $taskRepository;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {

        $tasks = $this->taskService->showTask();

        return view('index', [
            'tasks' => $tasks,
        ]);
    }

    public function createTask(Request $request)
    {
        $task = new Task();

        $task->title = $request->createTitle;
        $task->content = $request->createContent;
        $task->deadline = $request->createDeadline;
        $task->importance = $request->importance;
        $task->status = $request->status;

        $this->taskService->addTask($task);
        // \Log::debug($task);

        $tasks = $this->taskService->showTask();


        return view('index', [
            'tasks' => $tasks,
        ]);
    }

    public function createTaskPage(Request $request)
    {
        // \Log::debug($request);
        return view('create');
    }

    public function deleteTask($id)
    {
        // \Log::debugs($id);
        $tasks = $this->taskService->deleteTask($id);

        $tasks = $this->taskService->showTask();
        return view('index', [
            'tasks' => $tasks,
        ]);
    }

    public function editTaskPage($id)
    {
        $task = $this->taskService->findTask($id);

        return view('edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request)
    {

        $this->taskService->save($request);


        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $task = new Task();

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->importance = $request->importance;
        $task->status = $request->status;
        \Log::debug($task);

        $tasks = $this->taskService->search($task);

        return view('index', [
            'tasks' => $tasks,
        ]);

    }
}
