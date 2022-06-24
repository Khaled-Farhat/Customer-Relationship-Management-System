<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Silber\Bouncer\Database\Role;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Bouncer::can('view-any-role');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Silber\Bouncer\Database\Role $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $model)
    {
        return Bouncer::can('view-any-role');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Bouncer::can('create-role');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Silber\Bouncer\Database\Role $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Role $model)
    {
        if ($model->name == 'super-admin') {
            return false;
        }
        else {
            return Bouncer::can('edit-any-role');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Silber\Bouncer\Database\Role $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Role $model)
    {
        if ($model->name == 'super-admin' || $model->name == 'user') {
            return false;
        }
        else {
            return Bouncer::can('delete-any-role');
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Silber\Bouncer\Database\Role $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Role $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Silber\Bouncer\Database\Role $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $model)
    {
        //
    }
}
