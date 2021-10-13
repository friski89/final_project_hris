<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkLocation;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkLocationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the workLocation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list worklocations');
    }

    /**
     * Determine whether the workLocation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function view(User $user, WorkLocation $model)
    {
        return $user->hasPermissionTo('view worklocations');
    }

    /**
     * Determine whether the workLocation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create worklocations');
    }

    /**
     * Determine whether the workLocation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function update(User $user, WorkLocation $model)
    {
        return $user->hasPermissionTo('update worklocations');
    }

    /**
     * Determine whether the workLocation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function delete(User $user, WorkLocation $model)
    {
        return $user->hasPermissionTo('delete worklocations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete worklocations');
    }

    /**
     * Determine whether the workLocation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function restore(User $user, WorkLocation $model)
    {
        return false;
    }

    /**
     * Determine whether the workLocation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WorkLocation  $model
     * @return mixed
     */
    public function forceDelete(User $user, WorkLocation $model)
    {
        return false;
    }
}
