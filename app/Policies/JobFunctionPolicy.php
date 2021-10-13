<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobFunction;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobFunctionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobFunction can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobfunctions');
    }

    /**
     * Determine whether the jobFunction can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function view(User $user, JobFunction $model)
    {
        return $user->hasPermissionTo('view jobfunctions');
    }

    /**
     * Determine whether the jobFunction can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobfunctions');
    }

    /**
     * Determine whether the jobFunction can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function update(User $user, JobFunction $model)
    {
        return $user->hasPermissionTo('update jobfunctions');
    }

    /**
     * Determine whether the jobFunction can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function delete(User $user, JobFunction $model)
    {
        return $user->hasPermissionTo('delete jobfunctions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobfunctions');
    }

    /**
     * Determine whether the jobFunction can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function restore(User $user, JobFunction $model)
    {
        return false;
    }

    /**
     * Determine whether the jobFunction can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFunction  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobFunction $model)
    {
        return false;
    }
}
