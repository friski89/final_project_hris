<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompetenceLeadership;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetenceLeadershipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the competenceLeadership can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list competenceleaderships');
    }

    /**
     * Determine whether the competenceLeadership can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function view(User $user, CompetenceLeadership $model)
    {
        return $user->hasPermissionTo('view competenceleaderships');
    }

    /**
     * Determine whether the competenceLeadership can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create competenceleaderships');
    }

    /**
     * Determine whether the competenceLeadership can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function update(User $user, CompetenceLeadership $model)
    {
        return $user->hasPermissionTo('update competenceleaderships');
    }

    /**
     * Determine whether the competenceLeadership can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function delete(User $user, CompetenceLeadership $model)
    {
        return $user->hasPermissionTo('delete competenceleaderships');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete competenceleaderships');
    }

    /**
     * Determine whether the competenceLeadership can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function restore(User $user, CompetenceLeadership $model)
    {
        return false;
    }

    /**
     * Determine whether the competenceLeadership can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CompetenceLeadership  $model
     * @return mixed
     */
    public function forceDelete(User $user, CompetenceLeadership $model)
    {
        return false;
    }
}
