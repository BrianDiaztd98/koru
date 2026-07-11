<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminMediaService
{
    /**
     * Store and optimize an uploaded image in one step.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string                         $directory  Storage directory (e.g., 'services', 'packages', 'team')
     * @param  int                            $maxWidth   Maximum width for optimization (default: 1200)
     * @param  int                            $quality    WebP quality 0-100 (default: 75)
     * @return string  Optimized WebP path relative to storage disk (e.g., 'services/abc123.webp')
     */
    public static function storeImage(UploadedFile $file, string $directory, int $maxWidth = 1200, int $quality = 75): string
    {
        return ImageOptimizer::optimizeUploadedFile($file, $directory, $maxWidth, $quality);
    }

    /**
     * Store an image WITHOUT optimization (for formats that shouldn't be converted, like SVGs).
     */
    public static function storeImageRaw(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
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
