<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SkillsAndProfession;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillsAndProfessionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the skillsAndProfession can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list skillsandprofessions');
    }

    /**
     * Determine whether the skillsAndProfession can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function view(User $user, SkillsAndProfession $model)
    {
        return $user->hasPermissionTo('view skillsandprofessions');
    }

    /**
     * Determine whether the skillsAndProfession can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create skillsandprofessions');
    }

    /**
     * Determine whether the skillsAndProfession can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function update(User $user, SkillsAndProfession $model)
    {
        return $user->hasPermissionTo('update skillsandprofessions');
    }

    /**
     * Determine whether the skillsAndProfession can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function delete(User $user, SkillsAndProfession $model)
    {
        return $user->hasPermissionTo('delete skillsandprofessions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete skillsandprofessions');
    }

    /**
     * Determine whether the skillsAndProfession can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function restore(User $user, SkillsAndProfession $model)
    {
        return false;
    }

    /**
     * Determine whether the skillsAndProfession can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillsAndProfession  $model
     * @return mixed
     */
    public function forceDelete(User $user, SkillsAndProfession $model)
    {
        return false;
    }
}
