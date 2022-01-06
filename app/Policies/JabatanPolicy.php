<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Auth\Access\HandlesAuthorization;

class JabatanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jabatan can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jabatans');
    }

    /**
     * Determine whether the jabatan can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function view(User $user, Jabatan $model)
    {
        return $user->hasPermissionTo('view jabatans');
    }

    /**
     * Determine whether the jabatan can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jabatans');
    }

    /**
     * Determine whether the jabatan can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function update(User $user, Jabatan $model)
    {
        return $user->hasPermissionTo('update jabatans');
    }

    /**
     * Determine whether the jabatan can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function delete(User $user, Jabatan $model)
    {
        return $user->hasPermissionTo('delete jabatans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jabatans');
    }

    /**
     * Determine whether the jabatan can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function restore(User $user, Jabatan $model)
    {
        return false;
    }

    /**
     * Determine whether the jabatan can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Jabatan  $model
     * @return mixed
     */
    public function forceDelete(User $user, Jabatan $model)
    {
        return false;
    }
}
