<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobGrade;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobGradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobGrade can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobgrades');
    }

    /**
     * Determine whether the jobGrade can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function view(User $user, JobGrade $model)
    {
        return $user->hasPermissionTo('view jobgrades');
    }

    /**
     * Determine whether the jobGrade can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobgrades');
    }

    /**
     * Determine whether the jobGrade can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function update(User $user, JobGrade $model)
    {
        return $user->hasPermissionTo('update jobgrades');
    }

    /**
     * Determine whether the jobGrade can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function delete(User $user, JobGrade $model)
    {
        return $user->hasPermissionTo('delete jobgrades');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobgrades');
    }

    /**
     * Determine whether the jobGrade can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function restore(User $user, JobGrade $model)
    {
        return false;
    }

    /**
     * Determine whether the jobGrade can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobGrade  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobGrade $model)
    {
        return false;
    }
}
