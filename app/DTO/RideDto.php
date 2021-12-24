<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class RideDto
{
    public function __construct(
        private ?int $id,
        private float $hourlyRate,
        private float $dayRate,
        private int $noOfDoors,
        private bool $isActive,
        private ?UploadedFile $picture,
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function getDayRate(): float
    {
        return $this->dayRate;
    }

    public function getNoOfDoors(): int
    {
        return $this->noOfDoors;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getPicture(): ?UploadedFile
    {
        return $this->picture;
    }
}
