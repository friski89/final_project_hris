<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EducationalBackground;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationalBackgroundPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the educationalBackground can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list educationalbackgrounds');
    }

    /**
     * Determine whether the educationalBackground can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function view(User $user, EducationalBackground $model)
    {
        return $user->hasPermissionTo('view educationalbackgrounds');
    }

    /**
     * Determine whether the educationalBackground can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create educationalbackgrounds');
    }

    /**
     * Determine whether the educationalBackground can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function update(User $user, EducationalBackground $model)
    {
        return $user->hasPermissionTo('update educationalbackgrounds');
    }

    /**
     * Determine whether the educationalBackground can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function delete(User $user, EducationalBackground $model)
    {
        return $user->hasPermissionTo('delete educationalbackgrounds');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete educationalbackgrounds');
    }

    /**
     * Determine whether the educationalBackground can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function restore(User $user, EducationalBackground $model)
    {
        return false;
    }

    /**
     * Determine whether the educationalBackground can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EducationalBackground  $model
     * @return mixed
     */
    public function forceDelete(User $user, EducationalBackground $model)
    {
        return false;
    }
}
