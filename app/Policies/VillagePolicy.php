<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Village;
use Illuminate\Auth\Access\HandlesAuthorization;

class VillagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the village can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list villages');
    }

    /**
     * Determine whether the village can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function view(User $user, Village $model)
    {
        return $user->hasPermissionTo('view villages');
    }

    /**
     * Determine whether the village can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create villages');
    }

    /**
     * Determine whether the village can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function update(User $user, Village $model)
    {
        return $user->hasPermissionTo('update villages');
    }

    /**
     * Determine whether the village can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function delete(User $user, Village $model)
    {
        return $user->hasPermissionTo('delete villages');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete villages');
    }

    /**
     * Determine whether the village can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function restore(User $user, Village $model)
    {
        return false;
    }

    /**
     * Determine whether the village can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Village  $model
     * @return mixed
     */
    public function forceDelete(User $user, Village $model)
    {
        return false;
    }
}
