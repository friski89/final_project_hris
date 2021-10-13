<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompanyHome;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyHomePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the companyHome can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list companyhomes');
    }

    /**
     * Determine whether the companyHome can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function view(User $user, CompanyHome $model)
    {
        return $user->hasPermissionTo('view companyhomes');
    }

    /**
     * Determine whether the companyHome can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create companyhomes');
    }

    /**
     * Determine whether the companyHome can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function update(User $user, CompanyHome $model)
    {
        return $user->hasPermissionTo('update companyhomes');
    }

    /**
     * Determine whether the companyHome can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function delete(User $user, CompanyHome $model)
    {
        return $user->hasPermissionTo('delete companyhomes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete companyhomes');
    }

    /**
     * Determine whether the companyHome can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function restore(User $user, CompanyHome $model)
    {
        return false;
    }

    /**
     * Determine whether the companyHome can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompanyHome  $model
     * @return mixed
     */
    public function forceDelete(User $user, CompanyHome $model)
    {
        return false;
    }
}
