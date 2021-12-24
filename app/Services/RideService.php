<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\RideDto;
use App\Models\Ride;

class RideService
{
    public function create(RideDto $rideDto): Ride
    {
        $ride = new Ride();
        $ride->hourly_rate = $rideDto->getHourlyRate();
        $ride->day_rate = $rideDto->getDayRate();
        $ride->no_of_doors = $rideDto->getNoOfDoors();
        $ride->is_active = $rideDto->isActive();

        $ride->save();

        return $ride;
    }
}
