<?php

namespace Tests\Feature;

use App\Models\About;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AboutPageSimpleTest extends TestCase
{
    use RefreshDatabase;

    public function test_livewire_test_works(): void
    {
        $user = User::factory()->admin()->create();
        $this->actingAs($user, 'web');

        $about = About::factory()->create([
            'title' => 'Test Title',
        ]);

        $test = Livewire::test(\App\Livewire\Admin\AboutPage::class);
        
        if ($test === null) {
            $this->fail('Livewire::test returned null');
        }
        
        $test->assertSee('Test Title');
    }
}
