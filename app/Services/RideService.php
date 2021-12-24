<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\RideDto;
use App\Models\Ride;
use Exception;
use Illuminate\Support\Facades\Log;

class RideService
{
    public function __construct(
        private FileService $fileService,
    )
    {
    }

    public function saveFromDto(RideDto $rideDto): Ride
    {
        $ride = new Ride();
        $ride->hourly_rate = $rideDto->getHourlyRate();
        $ride->day_rate = $rideDto->getDayRate();
        $ride->no_of_doors = $rideDto->getNoOfDoors();
        $ride->is_active = $rideDto->isActive();

        try {
            $fileName = $this->fileService->upload($rideDto->getPicture());
            $ride->picture = $fileName;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }

        $ride->save();

        return $ride;
    }
}
