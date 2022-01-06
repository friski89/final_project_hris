<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PerformanceAppraisalHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerformanceAppraisalHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the performanceAppraisalHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list performanceappraisalhistories');
    }

    /**
     * Determine whether the performanceAppraisalHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function view(User $user, PerformanceAppraisalHistory $model)
    {
        return $user->hasPermissionTo('view performanceappraisalhistories');
    }

    /**
     * Determine whether the performanceAppraisalHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create performanceappraisalhistories');
    }

    /**
     * Determine whether the performanceAppraisalHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function update(User $user, PerformanceAppraisalHistory $model)
    {
        return $user->hasPermissionTo('update performanceappraisalhistories');
    }

    /**
     * Determine whether the performanceAppraisalHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function delete(User $user, PerformanceAppraisalHistory $model)
    {
        return $user->hasPermissionTo('delete performanceappraisalhistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete performanceappraisalhistories');
    }

    /**
     * Determine whether the performanceAppraisalHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function restore(User $user, PerformanceAppraisalHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the performanceAppraisalHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PerformanceAppraisalHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, PerformanceAppraisalHistory $model)
    {
        return false;
    }
}
