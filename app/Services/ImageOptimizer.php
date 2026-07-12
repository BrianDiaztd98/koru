<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageOptimizer
{
    /**
     * Supported MIME types for optimization.
     */
    private const SUPPORTED_MIME_TYPES = [
        'image/jpeg' => 'imagecreatefromjpeg',
        'image/png' => 'imagecreatefrompng',
        'image/webp' => 'imagecreatefromwebp',
    ];

    /**
     * Optimize an uploaded image: resize if needed, convert to WebP, clean up original.
     *
     * @param  string  $absolutePath  Absolute path to the stored image file
     * @param  int  $maxWidth  Maximum width in pixels (default: 1200)
     * @param  int  $quality  WebP quality 0-100 (default: 75)
     * @return string The new WebP filename (relative to storage disk root)
     */
    public static function optimize(string $absolutePath, int $maxWidth = 1200, int $quality = 75): string
    {
        if (! file_exists($absolutePath)) {
            throw new \InvalidArgumentException("File not found: {$absolutePath}");
        }

        $mimeType = self::detectMimeType($absolutePath);

        if (! isset(self::SUPPORTED_MIME_TYPES[$mimeType])) {
            // Unsupported format (e.g., SVG, GIF, AVIF) - return original filename
            return basename($absolutePath);
        }

        $createFunction = self::SUPPORTED_MIME_TYPES[$mimeType];
        $source = $createFunction($absolutePath);

        if (! $source) {
            // Failed to create image resource - return original
            return basename($absolutePath);
        }

        $originalWidth = imagesx($source);
        $originalHeight = imagesy($source);

        // Resize proportionally if wider than maxWidth
        if ($originalWidth > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int) round($originalHeight * ($maxWidth / $originalWidth));

            $resized = imagescale($source, $newWidth, $newHeight, IMG_BICUBIC);
            imagedestroy($source);
            $source = $resized;

            if (! $source) {
                return basename($absolutePath);
            }
        }

        // Prepare output path: same directory, same basename, .webp extension
        $directory = dirname($absolutePath);
        $basename = pathinfo($absolutePath, PATHINFO_FILENAME);
        $newFilename = "{$basename}.webp";
        $newPath = $directory.DIRECTORY_SEPARATOR.$newFilename;

        // Save as WebP
        $saved = imagewebp($source, $newPath, $quality);
        imagedestroy($source);

        if (! $saved) {
            // Fallback: return original if WebP save failed
            return basename($absolutePath);
        }

        // Delete original file if it wasn't already a .webp
        $originalExtension = strtolower(pathinfo($absolutePath, PATHINFO_EXTENSION));
        if ($originalExtension !== 'webp') {
            @unlink($absolutePath);
        }

        return $newFilename;
    }

    /**
     * Detect MIME type using getimagesize (more reliable than mime_content_type for images).
     */
    private static function detectMimeType(string $path): ?string
    {
        $imageInfo = @getimagesize($path);

        return $imageInfo['mime'] ?? null;
    }

    /**
     * Optimize an UploadedFile directly (convenience method for Livewire).
     *
     * @param  string  $directory  Storage directory (e.g., 'services', 'packages')
     * @return string The stored WebP path relative to storage disk (e.g., 'services/abc123.webp')
     */
    public static function optimizeUploadedFile(
        UploadedFile $file,
        string $directory,
        int $maxWidth = 1200,
        int $quality = 75
    ): string {
        // Store temporarily with original name
        $tempPath = $file->store($directory, 'public');
        $absolutePath = Storage::disk('public')->path($tempPath);

        // Optimize (returns just the new filename)
        $optimizedFilename = self::optimize($absolutePath, $maxWidth, $quality);

        // Return the new relative path
        return $directory.'/'.$optimizedFilename;
    }
}
