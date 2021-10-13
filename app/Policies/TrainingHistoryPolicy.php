<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TrainingHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the trainingHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list traininghistories');
    }

    /**
     * Determine whether the trainingHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function view(User $user, TrainingHistory $model)
    {
        return $user->hasPermissionTo('view traininghistories');
    }

    /**
     * Determine whether the trainingHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create traininghistories');
    }

    /**
     * Determine whether the trainingHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function update(User $user, TrainingHistory $model)
    {
        return $user->hasPermissionTo('update traininghistories');
    }

    /**
     * Determine whether the trainingHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function delete(User $user, TrainingHistory $model)
    {
        return $user->hasPermissionTo('delete traininghistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete traininghistories');
    }

    /**
     * Determine whether the trainingHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function restore(User $user, TrainingHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the trainingHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrainingHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, TrainingHistory $model)
    {
        return false;
    }
}
