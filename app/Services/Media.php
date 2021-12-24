<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;

trait Media
{
    public function getMediaObject(string $fileName, string $folder = FileService::IMAGES_FOLDER): string
    {
        return Storage::temporaryUrl(sprintf('%s/%s', $folder, $fileName), now()->addMinutes());
    }
}
