<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Direktorat;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirektoratPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the direktorat can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list direktorats');
    }

    /**
     * Determine whether the direktorat can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function view(User $user, Direktorat $model)
    {
        return $user->hasPermissionTo('view direktorats');
    }

    /**
     * Determine whether the direktorat can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create direktorats');
    }

    /**
     * Determine whether the direktorat can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function update(User $user, Direktorat $model)
    {
        return $user->hasPermissionTo('update direktorats');
    }

    /**
     * Determine whether the direktorat can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function delete(User $user, Direktorat $model)
    {
        return $user->hasPermissionTo('delete direktorats');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete direktorats');
    }

    /**
     * Determine whether the direktorat can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function restore(User $user, Direktorat $model)
    {
        return false;
    }

    /**
     * Determine whether the direktorat can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Direktorat  $model
     * @return mixed
     */
    public function forceDelete(User $user, Direktorat $model)
    {
        return false;
    }
}
