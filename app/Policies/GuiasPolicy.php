<?php

namespace App\Policies;

use App\Models\User;
use App\App\Models\Agendamento\Guia;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuiasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the guia.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Agendamento\Guia  $guia
     * @return mixed
     */
    public function view(User $user, Guia $guia)
    {
        //
    }

    /**
     * Determine whether the user can create guias.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the guia.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Agendamento\Guia  $guia
     * @return mixed
     */
    public function update(User $user, Guia $guia)
    {
        //
    }

    /**
     * Determine whether the user can delete the guia.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Agendamento\Guia  $guia
     * @return mixed
     */
    public function delete(User $user, Guia $guia)
    {
        //
    }
}
