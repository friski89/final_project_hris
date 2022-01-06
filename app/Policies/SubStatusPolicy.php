<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SubStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the subStatus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list substatuses');
    }

    /**
     * Determine whether the subStatus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function view(User $user, SubStatus $model)
    {
        return $user->hasPermissionTo('view substatuses');
    }

    /**
     * Determine whether the subStatus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create substatuses');
    }

    /**
     * Determine whether the subStatus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function update(User $user, SubStatus $model)
    {
        return $user->hasPermissionTo('update substatuses');
    }

    /**
     * Determine whether the subStatus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function delete(User $user, SubStatus $model)
    {
        return $user->hasPermissionTo('delete substatuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete substatuses');
    }

    /**
     * Determine whether the subStatus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function restore(User $user, SubStatus $model)
    {
        return false;
    }

    /**
     * Determine whether the subStatus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SubStatus  $model
     * @return mixed
     */
    public function forceDelete(User $user, SubStatus $model)
    {
        return false;
    }
}
