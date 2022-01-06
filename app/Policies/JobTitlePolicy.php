<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobTitle;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobTitlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobTitle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobtitles');
    }

    /**
     * Determine whether the jobTitle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function view(User $user, JobTitle $model)
    {
        return $user->hasPermissionTo('view jobtitles');
    }

    /**
     * Determine whether the jobTitle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobtitles');
    }

    /**
     * Determine whether the jobTitle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function update(User $user, JobTitle $model)
    {
        return $user->hasPermissionTo('update jobtitles');
    }

    /**
     * Determine whether the jobTitle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function delete(User $user, JobTitle $model)
    {
        return $user->hasPermissionTo('delete jobtitles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobtitles');
    }

    /**
     * Determine whether the jobTitle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function restore(User $user, JobTitle $model)
    {
        return false;
    }

    /**
     * Determine whether the jobTitle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobTitle  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobTitle $model)
    {
        return false;
    }
}
