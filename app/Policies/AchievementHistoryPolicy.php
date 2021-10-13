<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AchievementHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the achievementHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list achievementhistories');
    }

    /**
     * Determine whether the achievementHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function view(User $user, AchievementHistory $model)
    {
        return $user->hasPermissionTo('view achievementhistories');
    }

    /**
     * Determine whether the achievementHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create achievementhistories');
    }

    /**
     * Determine whether the achievementHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function update(User $user, AchievementHistory $model)
    {
        return $user->hasPermissionTo('update achievementhistories');
    }

    /**
     * Determine whether the achievementHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function delete(User $user, AchievementHistory $model)
    {
        return $user->hasPermissionTo('delete achievementhistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete achievementhistories');
    }

    /**
     * Determine whether the achievementHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function restore(User $user, AchievementHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the achievementHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AchievementHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, AchievementHistory $model)
    {
        return false;
    }
}
