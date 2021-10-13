<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OtherCompetencies;
use Illuminate\Auth\Access\HandlesAuthorization;

class OtherCompetenciesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the otherCompetencies can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allothercompetencies');
    }

    /**
     * Determine whether the otherCompetencies can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function view(User $user, OtherCompetencies $model)
    {
        return $user->hasPermissionTo('view allothercompetencies');
    }

    /**
     * Determine whether the otherCompetencies can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allothercompetencies');
    }

    /**
     * Determine whether the otherCompetencies can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function update(User $user, OtherCompetencies $model)
    {
        return $user->hasPermissionTo('update allothercompetencies');
    }

    /**
     * Determine whether the otherCompetencies can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function delete(User $user, OtherCompetencies $model)
    {
        return $user->hasPermissionTo('delete allothercompetencies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allothercompetencies');
    }

    /**
     * Determine whether the otherCompetencies can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function restore(User $user, OtherCompetencies $model)
    {
        return false;
    }

    /**
     * Determine whether the otherCompetencies can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OtherCompetencies  $model
     * @return mixed
     */
    public function forceDelete(User $user, OtherCompetencies $model)
    {
        return false;
    }
}
