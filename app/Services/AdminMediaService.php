<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminMediaService
{
    /**
     * Store an uploaded image without changing its format, dimensions, or quality.
     */
    public static function storeImage(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    /**
     * Store an image without changing its format, dimensions, or quality.
     */
    public static function storeImageRaw(UploadedFile $file, string $directory): string
    {
        return self::storeImage($file, $directory);
    }

    public static function deleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    public static function resolveImageUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        if (str_starts_with($path, 'img/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
