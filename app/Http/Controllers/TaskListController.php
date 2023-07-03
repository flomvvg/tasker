<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasklistRequest;
use App\Models\Task;
use App\Models\Tasklist;
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
        Tasklist::create($request->validated());
        return to_route('tasklist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasklist $tasklist)
    {
        $this->authorize('view', $tasklist);
        return view('tasklists.show', [
            'list' => $tasklist,
            'tasks' => $tasklist->task()->orderBy('done', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasklist $tasklist)
    {
        $this->authorize('edit', $tasklist);
        return view('tasklists.edit', ['list' => $tasklist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTasklistRequest $request, string $id)
    {
        $tasklist = Tasklist::find($id);
        if (Auth::id() == $tasklist->user_id){
            if ($request->validated()) {
                $tasklist = Tasklist::find($id);
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
    public function destroy(Tasklist $tasklist)
    {
        $this->authorize('delete', $tasklist);
        $tasklist->delete();
        return to_route('tasklist.index');
    }
}
