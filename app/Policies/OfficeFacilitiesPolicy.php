<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OfficeFacilities;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficeFacilitiesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the officeFacilities can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allofficefacilities');
    }

    /**
     * Determine whether the officeFacilities can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function view(User $user, OfficeFacilities $model)
    {
        return $user->hasPermissionTo('view allofficefacilities');
    }

    /**
     * Determine whether the officeFacilities can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allofficefacilities');
    }

    /**
     * Determine whether the officeFacilities can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function update(User $user, OfficeFacilities $model)
    {
        return $user->hasPermissionTo('update allofficefacilities');
    }

    /**
     * Determine whether the officeFacilities can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function delete(User $user, OfficeFacilities $model)
    {
        return $user->hasPermissionTo('delete allofficefacilities');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allofficefacilities');
    }

    /**
     * Determine whether the officeFacilities can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function restore(User $user, OfficeFacilities $model)
    {
        return false;
    }

    /**
     * Determine whether the officeFacilities can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OfficeFacilities  $model
     * @return mixed
     */
    public function forceDelete(User $user, OfficeFacilities $model)
    {
        return false;
    }
}
