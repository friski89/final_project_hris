<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Province;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvincePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the province can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list provinces');
    }

    /**
     * Determine whether the province can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function view(User $user, Province $model)
    {
        return $user->hasPermissionTo('view provinces');
    }

    /**
     * Determine whether the province can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create provinces');
    }

    /**
     * Determine whether the province can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function update(User $user, Province $model)
    {
        return $user->hasPermissionTo('update provinces');
    }

    /**
     * Determine whether the province can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function delete(User $user, Province $model)
    {
        return $user->hasPermissionTo('delete provinces');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete provinces');
    }

    /**
     * Determine whether the province can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function restore(User $user, Province $model)
    {
        return false;
    }

    /**
     * Determine whether the province can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Province  $model
     * @return mixed
     */
    public function forceDelete(User $user, Province $model)
    {
        return false;
    }
}
