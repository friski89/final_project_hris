<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AssignmentHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assignmentHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list assignmenthistories');
    }

    /**
     * Determine whether the assignmentHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function view(User $user, AssignmentHistory $model)
    {
        return $user->hasPermissionTo('view assignmenthistories');
    }

    /**
     * Determine whether the assignmentHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create assignmenthistories');
    }

    /**
     * Determine whether the assignmentHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function update(User $user, AssignmentHistory $model)
    {
        return $user->hasPermissionTo('update assignmenthistories');
    }

    /**
     * Determine whether the assignmentHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function delete(User $user, AssignmentHistory $model)
    {
        return $user->hasPermissionTo('delete assignmenthistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete assignmenthistories');
    }

    /**
     * Determine whether the assignmentHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function restore(User $user, AssignmentHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the assignmentHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignmentHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, AssignmentHistory $model)
    {
        return false;
    }
}
