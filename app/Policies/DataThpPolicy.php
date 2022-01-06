<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DataThp;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataThpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the dataThp can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list datathps');
    }

    /**
     * Determine whether the dataThp can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function view(User $user, DataThp $model)
    {
        return $user->hasPermissionTo('view datathps');
    }

    /**
     * Determine whether the dataThp can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create datathps');
    }

    /**
     * Determine whether the dataThp can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function update(User $user, DataThp $model)
    {
        return $user->hasPermissionTo('update datathps');
    }

    /**
     * Determine whether the dataThp can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function delete(User $user, DataThp $model)
    {
        return $user->hasPermissionTo('delete datathps');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete datathps');
    }

    /**
     * Determine whether the dataThp can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function restore(User $user, DataThp $model)
    {
        return false;
    }

    /**
     * Determine whether the dataThp can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DataThp  $model
     * @return mixed
     */
    public function forceDelete(User $user, DataThp $model)
    {
        return false;
    }
}
