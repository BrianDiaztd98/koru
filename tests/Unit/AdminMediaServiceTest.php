<?php

namespace Tests\Unit;

use App\Services\AdminMediaService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminMediaServiceTest extends TestCase
{
    public function test_uploaded_images_keep_their_original_format_and_dimensions(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('original.jpg', 2400, 1600);
        $path = AdminMediaService::storeImage($file, 'hero-slides');

        $storedPath = Storage::disk('public')->path($path);
        $dimensions = getimagesize($storedPath);

        Storage::disk('public')->assertExists($path);
        $this->assertStringEndsWith('.jpg', $path);
        $this->assertSame(2400, $dimensions[0]);
        $this->assertSame(1600, $dimensions[1]);
    }
}
