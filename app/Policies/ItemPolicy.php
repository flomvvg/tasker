<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\Task;
use App\Models\Tasklist;
use App\Models\User;

class ItemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Tasklist $tasklist, Task $task, Item $item)
    {
        return $tasklist->user()->is($user) && $task->tasklist()->is($tasklist) && $item->task()->is($task);
    }

    public function edit(User $user, Tasklist $tasklist, Task $task, Item $item)
    {
        return $tasklist->user()->is($user) && $task->tasklist()->is($tasklist) && $item->task()->is($task);
    }

    public function delete(User $user, Tasklist $tasklist, Task $task, Item $item)
    {
        return $tasklist->user()->is($user) && $task->tasklist()->is($tasklist) && $item->task()->is($task);
    }

}
