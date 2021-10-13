<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ServiceHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the serviceHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list servicehistories');
    }

    /**
     * Determine whether the serviceHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function view(User $user, ServiceHistory $model)
    {
        return $user->hasPermissionTo('view servicehistories');
    }

    /**
     * Determine whether the serviceHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create servicehistories');
    }

    /**
     * Determine whether the serviceHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function update(User $user, ServiceHistory $model)
    {
        return $user->hasPermissionTo('update servicehistories');
    }

    /**
     * Determine whether the serviceHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function delete(User $user, ServiceHistory $model)
    {
        return $user->hasPermissionTo('delete servicehistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete servicehistories');
    }

    /**
     * Determine whether the serviceHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function restore(User $user, ServiceHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the serviceHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, ServiceHistory $model)
    {
        return false;
    }
}
