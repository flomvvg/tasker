<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasklistRequest;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $lists = User::find($request->user()->id)->tasklists;
        return view('tasklists.index', ['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasklists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasklistRequest $request)
    {
        if ($request->validated()) {
            $tasklist = new TaskList();
            $tasklist->name = $request->name;
            $tasklist->description = $request->description;
            $tasklist->user_id = Auth::id();
            $tasklist->save();
        }
        return to_route('tasklist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list = TaskList::find($id);
        if (Auth::id() == $list->user_id){
            return view('tasklists.show', ['list' => $list]);
        }
        return abort(403, 'You are not authorized to view this task list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $list = TaskList::find($id);
        if (Auth::id() == $list->user_id){
            return view('tasklists.edit', ['list' => $list]);
        }
        return abort(403, 'You are not authorized to edit this task list');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTasklistRequest $request, string $id)
    {
        $tasklist = TaskList::find($id);
        if (Auth::id() == $tasklist->user_id){
            if ($request->validated()) {
                $tasklist = TaskList::find($id);
                $tasklist->name = $request->name;
                $tasklist->description = $request->description;
                $tasklist->user_id = Auth::id();
                $tasklist->save();
                return to_route('tasklist.show', $tasklist);
            }
        }
        return abort(403, 'You are not authorized to edit this task list');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasklist = TaskList::find($id);
        if (Auth::id() == $tasklist->user_id){
            TaskList::destroy($id);
            return to_route('tasklist.index');
        }
        return abort(403, 'You are not authorized to edit this task list');
    }
}
