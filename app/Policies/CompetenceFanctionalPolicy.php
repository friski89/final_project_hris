<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompetenceFanctional;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetenceFanctionalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competenceFanctional can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list competencefanctionals');
    }

    /**
     * Determine whether the competenceFanctional can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function view(User $user, CompetenceFanctional $model)
    {
        return $user->hasPermissionTo('view competencefanctionals');
    }

    /**
     * Determine whether the competenceFanctional can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create competencefanctionals');
    }

    /**
     * Determine whether the competenceFanctional can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function update(User $user, CompetenceFanctional $model)
    {
        return $user->hasPermissionTo('update competencefanctionals');
    }

    /**
     * Determine whether the competenceFanctional can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function delete(User $user, CompetenceFanctional $model)
    {
        return $user->hasPermissionTo('delete competencefanctionals');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete competencefanctionals');
    }

    /**
     * Determine whether the competenceFanctional can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function restore(User $user, CompetenceFanctional $model)
    {
        return false;
    }

    /**
     * Determine whether the competenceFanctional can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceFanctional  $model
     * @return mixed
     */
    public function forceDelete(User $user, CompetenceFanctional $model)
    {
        return false;
    }
}
