<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\TrackLandingPageVisit;
use App\Livewire\Admin\AboutPageManager\AboutPageManager;
use App\Livewire\Admin\Auth\ForgotPassword;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\ResetPassword;
// Deposits (desactivado temporalmente 2026-09): descomentar junto con la ruta discounts más abajo.
// use App\Livewire\Admin\DepositManager\DepositManager;
use App\Livewire\Admin\EducationBoardManager\EducationBoardManager;
use App\Livewire\Admin\GoogleReviewManager\GoogleReviewManager;
use App\Livewire\Admin\HeroCarouselManager\HeroCarouselManager;
use App\Livewire\Admin\LandingPageManager\LandingPageManager;
use App\Livewire\Admin\PackageManager\PackageManager;
use App\Livewire\Admin\ServiceManager\ServiceManager;
use App\Livewire\Admin\TeamMembersManager\TeamMembersManager;
use App\Livewire\Admin\UserManager\UserManager;
use App\Livewire\Components\CourseEnrollmentForm;
use App\Livewire\Components\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class)->middleware(TrackLandingPageVisit::class);
Route::get('professional-ce/register/{course}', CourseEnrollmentForm::class)
    ->name('professional-ce.register');

Route::middleware(['guest'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('password/forgot', ForgotPassword::class)->name('password.request');
    Route::get('password/reset/{token}', ResetPassword::class)->name('password.reset');
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

    Route::get('google-reviews', GoogleReviewManager::class)->name('google-reviews.index');
    Route::get('google-reviews/create', GoogleReviewManager::class)->name('google-reviews.create');
    Route::get('google-reviews/{googleReview}/edit', GoogleReviewManager::class)->name('google-reviews.edit');

    Route::get('education', EducationBoardManager::class)->name('education.index');
    Route::get('education/create', EducationBoardManager::class)->name('education.create');
    Route::get('education/{course}/edit', EducationBoardManager::class)->name('education.edit');

    Route::get('team', TeamMembersManager::class)->name('team.index');
    Route::get('team/create', TeamMembersManager::class)->name('team.create');
    Route::get('team/{teamMember}/edit', TeamMembersManager::class)->name('team.edit');

    // Packages SPA-managed via PackageManager.
    Route::get('packages', PackageManager::class)->name('packages.index');
    Route::get('packages/create', PackageManager::class)->name('packages.create');
    Route::get('packages/{package}/edit', PackageManager::class)->name('packages.edit');

    // Day-based discount configuration.
    // Deposits desactivado temporalmente (2026-09): descomentar para reactivar.
    // Route::get('discounts', DepositManager::class)->name('discounts.index');

    // Hero carousel management.
    Route::get('hero-carousel', HeroCarouselManager::class)->name('hero-carousel.index');

    // User Management
    Route::get('users', UserManager::class)->name('users.index');
    Route::get('users/create', UserManager::class)->name('users.create');
    Route::get('users/{user}/edit', UserManager::class)->name('users.edit');
});
