<?php

namespace App\Policies;

use App\Ivent;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any ivents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the ivent.
     *
     * @param  \App\User  $user
     * @param  \App\Ivent  $ivent
     * @return mixed
     */
    public function view(User $user, Ivent $ivent)
    {
        //
    }

    /**
     * Determine whether the user can create ivents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ivent.
     *
     * @param  \App\User  $user
     * @param  \App\Ivent  $ivent
     * @return mixed
     */
    public function update(User $user, Ivent $ivent)
    {
        //
    }

    /**
     * Determine whether the user can delete the ivent.
     *
     * @param  \App\User  $user
     * @param  \App\Ivent  $ivent
     * @return mixed
     */
    public function delete(User $user, Ivent $ivent)
    {
        //
    }

    /**
     * Determine whether the user can restore the ivent.
     *
     * @param  \App\User  $user
     * @param  \App\Ivent  $ivent
     * @return mixed
     */
    public function restore(User $user, Ivent $ivent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ivent.
     *
     * @param  \App\User  $user
     * @param  \App\Ivent  $ivent
     * @return mixed
     */
    public function forceDelete(User $user, Ivent $ivent)
    {
        //
    }
}
