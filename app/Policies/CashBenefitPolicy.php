<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CashBenefit;
use Illuminate\Auth\Access\HandlesAuthorization;

class CashBenefitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cashBenefit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list cashbenefits');
    }

    /**
     * Determine whether the cashBenefit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function view(User $user, CashBenefit $model)
    {
        return $user->hasPermissionTo('view cashbenefits');
    }

    /**
     * Determine whether the cashBenefit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cashbenefits');
    }

    /**
     * Determine whether the cashBenefit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function update(User $user, CashBenefit $model)
    {
        return $user->hasPermissionTo('update cashbenefits');
    }

    /**
     * Determine whether the cashBenefit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function delete(User $user, CashBenefit $model)
    {
        return $user->hasPermissionTo('delete cashbenefits');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete cashbenefits');
    }

    /**
     * Determine whether the cashBenefit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function restore(User $user, CashBenefit $model)
    {
        return false;
    }

    /**
     * Determine whether the cashBenefit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CashBenefit  $model
     * @return mixed
     */
    public function forceDelete(User $user, CashBenefit $model)
    {
        return false;
    }
}
