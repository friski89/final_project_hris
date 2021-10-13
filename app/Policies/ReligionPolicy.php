<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Religion;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReligionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the religion can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list religions');
    }

    /**
     * Determine whether the religion can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function view(User $user, Religion $model)
    {
        return $user->hasPermissionTo('view religions');
    }

    /**
     * Determine whether the religion can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create religions');
    }

    /**
     * Determine whether the religion can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function update(User $user, Religion $model)
    {
        return $user->hasPermissionTo('update religions');
    }

    /**
     * Determine whether the religion can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function delete(User $user, Religion $model)
    {
        return $user->hasPermissionTo('delete religions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete religions');
    }

    /**
     * Determine whether the religion can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function restore(User $user, Religion $model)
    {
        return false;
    }

    /**
     * Determine whether the religion can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Religion  $model
     * @return mixed
     */
    public function forceDelete(User $user, Religion $model)
    {
        return false;
    }
}
