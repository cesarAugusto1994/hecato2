<?php

namespace App\Policies;

use App\Models\User;
use App\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgendaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function view(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can create schedules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function update(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can delete the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Schedule  $schedule
     * @return mixed
     */
    public function delete(User $user, Schedule $schedule)
    {
        //
    }
}
