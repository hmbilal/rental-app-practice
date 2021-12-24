<?php

namespace App\Models;

use App\Services\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory, Media;

    public function getPictureAttribute(?string $value): ?string
    {
        return $value ? $this->getMediaObject($value) : null;
    }
}
