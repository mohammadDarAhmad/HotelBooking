<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\Booking;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can add a booking.
     *
     * @param Booking $booking
     * @return mixed
     */
    public function store(Booking $booking)
    {

        return false;
    }
    public function update(Booking $booking)
    {

        return false;
    }
}
