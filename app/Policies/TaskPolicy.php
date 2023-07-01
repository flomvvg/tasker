<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\Tasklist;
use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Task $task, Tasklist $tasklist)
    {
        return $task->tasklist()->is($tasklist) && $tasklist->user()->is($user);
    }

    public function edit(User $user, Task $task, Tasklist $tasklist)
    {
        return $task->tasklist()->is($tasklist) && $tasklist->user()->is($user);
    }
}
