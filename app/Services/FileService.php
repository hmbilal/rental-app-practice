<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public const IMAGES_FOLDER = 'images';

    public function upload(?UploadedFile $file): ?string
    {
        if (null === $file) {
            return null;
        }

        $fileName = sprintf('%s.%s', md5((string)time()), $file->extension());

        Storage::putFileAs(
            self::IMAGES_FOLDER,
            $file,
            $fileName,
        );

        return $fileName;
    }
}
