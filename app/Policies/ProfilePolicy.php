<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the profile can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list profiles');
    }

    /**
     * Determine whether the profile can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function view(User $user, Profile $model)
    {
        return $user->hasPermissionTo('view profiles');
    }

    /**
     * Determine whether the profile can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create profiles');
    }

    /**
     * Determine whether the profile can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function update(User $user, Profile $model)
    {
        return $user->hasPermissionTo('update profiles');
    }

    /**
     * Determine whether the profile can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function delete(User $user, Profile $model)
    {
        return $user->hasPermissionTo('delete profiles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete profiles');
    }

    /**
     * Determine whether the profile can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function restore(User $user, Profile $model)
    {
        return false;
    }

    /**
     * Determine whether the profile can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Profile  $model
     * @return mixed
     */
    public function forceDelete(User $user, Profile $model)
    {
        return false;
    }
}
