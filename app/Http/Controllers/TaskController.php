<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\Tasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use mysql_xdevapi\TableSelect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tasklist $tasklist)
    {
        return view('tasks.create', ['tasklist' => $tasklist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, Tasklist $tasklist)
    {
        $task = new Task($request->validated());
        $task->tasklist_id = $tasklist->id;
        $task->save();
        return to_route('tasklist.show', ['tasklist' => $tasklist]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasklist $tasklist, Task $task)
    {
        $this->authorize('view', [$task, $tasklist]);
        $items = $task->items;
        return view('tasks.show', ['task' => $task, 'tasklist' => $tasklist, 'items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasklist $tasklist, Task $task)
    {
        $this->authorize('edit', [$task, $tasklist]);
        return view('tasks.edit', ['tasklist' => $tasklist, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $taskRequest, Tasklist $tasklist, Task $task)
    {
        $this->authorize('edit', [$task, $tasklist]);
        $oldTask = Task::find($task->id);
        $oldTask->update($taskRequest->validated());
        return to_route('tasklist.task.show', [$tasklist, $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function done(Tasklist $tasklist, Task $task)
    {
        $this->authorize('edit', [$task, $tasklist]);
        $task->done = !$task->done;
        $task->save();
        return to_route('tasklist.show', $tasklist);
    }
}
