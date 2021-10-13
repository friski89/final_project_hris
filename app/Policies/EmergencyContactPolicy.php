<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EmergencyContact;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmergencyContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the emergencyContact can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list emergencycontacts');
    }

    /**
     * Determine whether the emergencyContact can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function view(User $user, EmergencyContact $model)
    {
        return $user->hasPermissionTo('view emergencycontacts');
    }

    /**
     * Determine whether the emergencyContact can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create emergencycontacts');
    }

    /**
     * Determine whether the emergencyContact can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function update(User $user, EmergencyContact $model)
    {
        return $user->hasPermissionTo('update emergencycontacts');
    }

    /**
     * Determine whether the emergencyContact can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function delete(User $user, EmergencyContact $model)
    {
        return $user->hasPermissionTo('delete emergencycontacts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete emergencycontacts');
    }

    /**
     * Determine whether the emergencyContact can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function restore(User $user, EmergencyContact $model)
    {
        return false;
    }

    /**
     * Determine whether the emergencyContact can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmergencyContact  $model
     * @return mixed
     */
    public function forceDelete(User $user, EmergencyContact $model)
    {
        return false;
    }
}
