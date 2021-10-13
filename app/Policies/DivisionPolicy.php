<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Division;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the division can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list divisions');
    }

    /**
     * Determine whether the division can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function view(User $user, Division $model)
    {
        return $user->hasPermissionTo('view divisions');
    }

    /**
     * Determine whether the division can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create divisions');
    }

    /**
     * Determine whether the division can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function update(User $user, Division $model)
    {
        return $user->hasPermissionTo('update divisions');
    }

    /**
     * Determine whether the division can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function delete(User $user, Division $model)
    {
        return $user->hasPermissionTo('delete divisions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete divisions');
    }

    /**
     * Determine whether the division can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function restore(User $user, Division $model)
    {
        return false;
    }

    /**
     * Determine whether the division can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Division  $model
     * @return mixed
     */
    public function forceDelete(User $user, Division $model)
    {
        return false;
    }
}
