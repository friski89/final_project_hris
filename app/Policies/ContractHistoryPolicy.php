<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ContractHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContractHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contractHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list contracthistories');
    }

    /**
     * Determine whether the contractHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function view(User $user, ContractHistory $model)
    {
        return $user->hasPermissionTo('view contracthistories');
    }

    /**
     * Determine whether the contractHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create contracthistories');
    }

    /**
     * Determine whether the contractHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function update(User $user, ContractHistory $model)
    {
        return $user->hasPermissionTo('update contracthistories');
    }

    /**
     * Determine whether the contractHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function delete(User $user, ContractHistory $model)
    {
        return $user->hasPermissionTo('delete contracthistories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete contracthistories');
    }

    /**
     * Determine whether the contractHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function restore(User $user, ContractHistory $model)
    {
        return false;
    }

    /**
     * Determine whether the contractHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContractHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, ContractHistory $model)
    {
        return false;
    }
}
