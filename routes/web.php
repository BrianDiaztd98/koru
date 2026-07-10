<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Middleware\AdminAccess;
use App\Livewire\Admin\AboutPageManager\AboutPageManager;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\ClientOutcomeManager\ClientOutcomeManager;
use App\Livewire\Admin\DepositManager\DepositManager;
use App\Livewire\Admin\HeroCarouselManager\HeroCarouselManager;
use App\Livewire\Admin\LandingPageManager\LandingPageManager;
use App\Livewire\Admin\PackageManager\PackageManager;
use App\Livewire\Admin\ServiceManager\ServiceManager;
use App\Livewire\Admin\TeamMembersManager\TeamMembersManager;
use App\Livewire\Components\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);

Route::middleware(['guest'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::post('admin/logout', [LoginController::class, 'destroy'])
    ->middleware([AdminAccess::class])
    ->name('admin.logout');

Route::middleware([AdminAccess::class])->prefix('admin')->name('admin.')->group(function () {
    // Livewire SPA entry points for admin
    Route::get('management', LandingPageManager::class)->name('management.index');

    // About page (SPA) - map GET routes used by tests/views to the Livewire component
    Route::get('about', AboutPageManager::class)->name('about.index');
    Route::get('about/edit', AboutPageManager::class)->name('about.edit');
    Route::get('about/create', AboutPageManager::class)->name('about.create');

    // Services SPA-managed via ServiceManager. Provide GET routes for index/create/edit used by UI/tests.
    Route::get('services', ServiceManager::class)->name('services.index');
    Route::get('services/create', ServiceManager::class)->name('services.create');
    Route::get('services/{service}/edit', ServiceManager::class)->name('services.edit');

    Route::get('client-outcomes', ClientOutcomeManager::class)->name('client-outcomes.index');
    Route::get('client-outcomes/create', ClientOutcomeManager::class)->name('client-outcomes.create');
    Route::get('client-outcomes/{testimonial}/edit', ClientOutcomeManager::class)->name('client-outcomes.edit');

    Route::get('team', TeamMembersManager::class)->name('team.index');
    Route::get('team/create', TeamMembersManager::class)->name('team.create');
    Route::get('team/{teamMember}/edit', TeamMembersManager::class)->name('team.edit');

    // Packages SPA-managed via PackageManager.
    Route::get('packages', PackageManager::class)->name('packages.index');
    Route::get('packages/create', PackageManager::class)->name('packages.create');
    Route::get('packages/{package}/edit', PackageManager::class)->name('packages.edit');

    // Day-based discount configuration.
    Route::get('discounts', DepositManager::class)->name('discounts.index');

    // Hero carousel management.
    Route::get('hero-carousel', HeroCarouselManager::class)->name('hero-carousel.index');
});
