<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Regencie;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegenciePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the regencie can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list regencies');
    }

    /**
     * Determine whether the regencie can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function view(User $user, Regencie $model)
    {
        return $user->hasPermissionTo('view regencies');
    }

    /**
     * Determine whether the regencie can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create regencies');
    }

    /**
     * Determine whether the regencie can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function update(User $user, Regencie $model)
    {
        return $user->hasPermissionTo('update regencies');
    }

    /**
     * Determine whether the regencie can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function delete(User $user, Regencie $model)
    {
        return $user->hasPermissionTo('delete regencies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete regencies');
    }

    /**
     * Determine whether the regencie can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function restore(User $user, Regencie $model)
    {
        return false;
    }

    /**
     * Determine whether the regencie can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regencie  $model
     * @return mixed
     */
    public function forceDelete(User $user, Regencie $model)
    {
        return false;
    }
}
