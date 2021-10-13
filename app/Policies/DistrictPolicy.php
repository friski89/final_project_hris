<?php

namespace App\Policies;

use App\Models\User;
use App\Models\District;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistrictPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the district can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list districts');
    }

    /**
     * Determine whether the district can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function view(User $user, District $model)
    {
        return $user->hasPermissionTo('view districts');
    }

    /**
     * Determine whether the district can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create districts');
    }

    /**
     * Determine whether the district can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function update(User $user, District $model)
    {
        return $user->hasPermissionTo('update districts');
    }

    /**
     * Determine whether the district can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function delete(User $user, District $model)
    {
        return $user->hasPermissionTo('delete districts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete districts');
    }

    /**
     * Determine whether the district can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function restore(User $user, District $model)
    {
        return false;
    }

    /**
     * Determine whether the district can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\District  $model
     * @return mixed
     */
    public function forceDelete(User $user, District $model)
    {
        return false;
    }
}
