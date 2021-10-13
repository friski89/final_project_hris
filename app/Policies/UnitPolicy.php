<?php

namespace App\Policies;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the unit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list units');
    }

    /**
     * Determine whether the unit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function view(User $user, Unit $model)
    {
        return $user->hasPermissionTo('view units');
    }

    /**
     * Determine whether the unit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create units');
    }

    /**
     * Determine whether the unit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function update(User $user, Unit $model)
    {
        return $user->hasPermissionTo('update units');
    }

    /**
     * Determine whether the unit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function delete(User $user, Unit $model)
    {
        return $user->hasPermissionTo('delete units');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete units');
    }

    /**
     * Determine whether the unit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function restore(User $user, Unit $model)
    {
        return false;
    }

    /**
     * Determine whether the unit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Unit  $model
     * @return mixed
     */
    public function forceDelete(User $user, Unit $model)
    {
        return false;
    }
}
