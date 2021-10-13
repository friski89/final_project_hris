<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AlamatKerja;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlamatKerjaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the alamatKerja can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alamatkerjas');
    }

    /**
     * Determine whether the alamatKerja can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function view(User $user, AlamatKerja $model)
    {
        return $user->hasPermissionTo('view alamatkerjas');
    }

    /**
     * Determine whether the alamatKerja can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alamatkerjas');
    }

    /**
     * Determine whether the alamatKerja can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function update(User $user, AlamatKerja $model)
    {
        return $user->hasPermissionTo('update alamatkerjas');
    }

    /**
     * Determine whether the alamatKerja can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function delete(User $user, AlamatKerja $model)
    {
        return $user->hasPermissionTo('delete alamatkerjas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alamatkerjas');
    }

    /**
     * Determine whether the alamatKerja can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function restore(User $user, AlamatKerja $model)
    {
        return false;
    }

    /**
     * Determine whether the alamatKerja can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AlamatKerja  $model
     * @return mixed
     */
    public function forceDelete(User $user, AlamatKerja $model)
    {
        return false;
    }
}
