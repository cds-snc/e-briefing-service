<?php

namespace App\Policies;

use App\Trip;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Trip $trip)
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id == $trip->creator->id || $trip->collaborators->pluck('id')->contains($user->id);
    }
}
