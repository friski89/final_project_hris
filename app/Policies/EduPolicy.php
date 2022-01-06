<?php

namespace App\Policies;

use App\Models\Edu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the edu can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list edus');
    }

    /**
     * Determine whether the edu can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function view(User $user, Edu $model)
    {
        return $user->hasPermissionTo('view edus');
    }

    /**
     * Determine whether the edu can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create edus');
    }

    /**
     * Determine whether the edu can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function update(User $user, Edu $model)
    {
        return $user->hasPermissionTo('update edus');
    }

    /**
     * Determine whether the edu can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function delete(User $user, Edu $model)
    {
        return $user->hasPermissionTo('delete edus');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete edus');
    }

    /**
     * Determine whether the edu can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function restore(User $user, Edu $model)
    {
        return false;
    }

    /**
     * Determine whether the edu can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Edu  $model
     * @return mixed
     */
    public function forceDelete(User $user, Edu $model)
    {
        return false;
    }
}
