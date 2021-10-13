<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobFamily;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobFamilyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobFamily can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobfamilies');
    }

    /**
     * Determine whether the jobFamily can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function view(User $user, JobFamily $model)
    {
        return $user->hasPermissionTo('view jobfamilies');
    }

    /**
     * Determine whether the jobFamily can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobfamilies');
    }

    /**
     * Determine whether the jobFamily can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function update(User $user, JobFamily $model)
    {
        return $user->hasPermissionTo('update jobfamilies');
    }

    /**
     * Determine whether the jobFamily can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function delete(User $user, JobFamily $model)
    {
        return $user->hasPermissionTo('delete jobfamilies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobfamilies');
    }

    /**
     * Determine whether the jobFamily can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function restore(User $user, JobFamily $model)
    {
        return false;
    }

    /**
     * Determine whether the jobFamily can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobFamily  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobFamily $model)
    {
        return false;
    }
}
