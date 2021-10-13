<?php

namespace App\Policies;

use App\Models\User;
use App\Models\InsuranceFacility;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsuranceFacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the insuranceFacility can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list insurancefacilities');
    }

    /**
     * Determine whether the insuranceFacility can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function view(User $user, InsuranceFacility $model)
    {
        return $user->hasPermissionTo('view insurancefacilities');
    }

    /**
     * Determine whether the insuranceFacility can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create insurancefacilities');
    }

    /**
     * Determine whether the insuranceFacility can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function update(User $user, InsuranceFacility $model)
    {
        return $user->hasPermissionTo('update insurancefacilities');
    }

    /**
     * Determine whether the insuranceFacility can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function delete(User $user, InsuranceFacility $model)
    {
        return $user->hasPermissionTo('delete insurancefacilities');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete insurancefacilities');
    }

    /**
     * Determine whether the insuranceFacility can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function restore(User $user, InsuranceFacility $model)
    {
        return false;
    }

    /**
     * Determine whether the insuranceFacility can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceFacility  $model
     * @return mixed
     */
    public function forceDelete(User $user, InsuranceFacility $model)
    {
        return false;
    }
}
