<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BandPosition;
use Illuminate\Auth\Access\HandlesAuthorization;

class BandPositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the bandPosition can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list bandpositions');
    }

    /**
     * Determine whether the bandPosition can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function view(User $user, BandPosition $model)
    {
        return $user->hasPermissionTo('view bandpositions');
    }

    /**
     * Determine whether the bandPosition can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bandpositions');
    }

    /**
     * Determine whether the bandPosition can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function update(User $user, BandPosition $model)
    {
        return $user->hasPermissionTo('update bandpositions');
    }

    /**
     * Determine whether the bandPosition can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function delete(User $user, BandPosition $model)
    {
        return $user->hasPermissionTo('delete bandpositions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete bandpositions');
    }

    /**
     * Determine whether the bandPosition can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function restore(User $user, BandPosition $model)
    {
        return false;
    }

    /**
     * Determine whether the bandPosition can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BandPosition  $model
     * @return mixed
     */
    public function forceDelete(User $user, BandPosition $model)
    {
        return false;
    }
}
