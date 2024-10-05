<?php

namespace App\Policies\Task;

use App\Models\Task\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the User can view any models.
     */
    public function viewAny(User $user): bool
    {
        //return $user->hasPermissionTo('task-list');
    }

    /**
     * Determine whether the User can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the User can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the User can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the User can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the User can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the User can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        //
    }
}
