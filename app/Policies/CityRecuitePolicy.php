<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CityRecuite;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityRecuitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cityRecuite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list cityrecuites');
    }

    /**
     * Determine whether the cityRecuite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function view(User $user, CityRecuite $model)
    {
        return $user->hasPermissionTo('view cityrecuites');
    }

    /**
     * Determine whether the cityRecuite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cityrecuites');
    }

    /**
     * Determine whether the cityRecuite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function update(User $user, CityRecuite $model)
    {
        return $user->hasPermissionTo('update cityrecuites');
    }

    /**
     * Determine whether the cityRecuite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function delete(User $user, CityRecuite $model)
    {
        return $user->hasPermissionTo('delete cityrecuites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete cityrecuites');
    }

    /**
     * Determine whether the cityRecuite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function restore(User $user, CityRecuite $model)
    {
        return false;
    }

    /**
     * Determine whether the cityRecuite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityRecuite  $model
     * @return mixed
     */
    public function forceDelete(User $user, CityRecuite $model)
    {
        return false;
    }
}
