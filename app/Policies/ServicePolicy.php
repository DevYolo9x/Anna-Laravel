<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function index(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.services.index'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.services.create'));
    }

    /**
     * Determine whether the user can edit the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.services.edit'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function destroy(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.services.destroy'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Service $Service)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Service $Service)
    {
        //
    }
}
