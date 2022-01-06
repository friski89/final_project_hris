<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StatusEmployee;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusEmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the statusEmployee can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list statusemployees');
    }

    /**
     * Determine whether the statusEmployee can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function view(User $user, StatusEmployee $model)
    {
        return $user->hasPermissionTo('view statusemployees');
    }

    /**
     * Determine whether the statusEmployee can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create statusemployees');
    }

    /**
     * Determine whether the statusEmployee can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function update(User $user, StatusEmployee $model)
    {
        return $user->hasPermissionTo('update statusemployees');
    }

    /**
     * Determine whether the statusEmployee can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function delete(User $user, StatusEmployee $model)
    {
        return $user->hasPermissionTo('delete statusemployees');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete statusemployees');
    }

    /**
     * Determine whether the statusEmployee can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function restore(User $user, StatusEmployee $model)
    {
        return false;
    }

    /**
     * Determine whether the statusEmployee can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StatusEmployee  $model
     * @return mixed
     */
    public function forceDelete(User $user, StatusEmployee $model)
    {
        return false;
    }
}
