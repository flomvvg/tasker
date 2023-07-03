<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Models\Task;
use App\Models\Tasklist;
use Illuminate\Http\Request;

class ItemController extends Controller
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
    public function create(Tasklist $tasklist, Task $task)
    {
        return view('item.create', ['tasklist' => $tasklist, 'task' => $task]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request, Tasklist $tasklist, Task $task)
    {
        $item = new Item($request->validated());
        $item->task_id = $task->id;
        $item->save();
        return to_route('tasklist.task.show', [$tasklist, $task]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasklist $tasklist, Task $task, Item $item)
    {
        $this->authorize('view', [$tasklist, $task, $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasklist $tasklist, Task $task, Item $item)
    {
        $this->authorize('edit', [$tasklist, $task, $item]);
        return view('item.edit', ['tasklist' => $tasklist, 'task' => $task, 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreItemRequest $request, Tasklist $tasklist, Task $task, Item $item)
    {
        $this->authorize('edit', [$tasklist, $task, $item]);
        $item->update($request->validated());
        return to_route('tasklist.task.show', ['tasklist' => $tasklist, 'task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasklist $tasklist, Task $task, Item $item)
    {
        $this->authorize('delete', [$tasklist, $task, $item]);
        $item->delete();
        return to_route('tasklist.task.show', ['tasklist' => $tasklist, 'task' => $task]);
    }
}
