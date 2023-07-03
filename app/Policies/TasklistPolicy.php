<?php

namespace App\Policies;

use App\Models\Tasklist;
use App\Models\User;

class TasklistPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Tasklist $list)
    {
        return $list->user()->is($user);
    }

    public function edit(User $user, Tasklist $list)
    {
        return $list->user()->is($user);
    }

    public function delete(User $user, Tasklist $list)
    {
        return $list->user()->is($user);
    }

}
