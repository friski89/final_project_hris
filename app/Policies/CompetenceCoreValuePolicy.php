<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompetenceCoreValue;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetenceCoreValuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competenceCoreValue can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list competencecorevalues');
    }

    /**
     * Determine whether the competenceCoreValue can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function view(User $user, CompetenceCoreValue $model)
    {
        return $user->hasPermissionTo('view competencecorevalues');
    }

    /**
     * Determine whether the competenceCoreValue can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create competencecorevalues');
    }

    /**
     * Determine whether the competenceCoreValue can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function update(User $user, CompetenceCoreValue $model)
    {
        return $user->hasPermissionTo('update competencecorevalues');
    }

    /**
     * Determine whether the competenceCoreValue can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function delete(User $user, CompetenceCoreValue $model)
    {
        return $user->hasPermissionTo('delete competencecorevalues');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete competencecorevalues');
    }

    /**
     * Determine whether the competenceCoreValue can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function restore(User $user, CompetenceCoreValue $model)
    {
        return false;
    }

    /**
     * Determine whether the competenceCoreValue can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceCoreValue  $model
     * @return mixed
     */
    public function forceDelete(User $user, CompetenceCoreValue $model)
    {
        return false;
    }
}
