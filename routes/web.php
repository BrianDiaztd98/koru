<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Livewire\Admin\ManagementPage;
use App\Livewire\Admin\AboutPage;
use App\Livewire\Admin\ServiceManager\ServiceManagerPage;
use App\Http\Middleware\AdminAccess;
use App\Livewire\Components\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);

Route::middleware(['guest'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::post('admin/logout', [LoginController::class, 'destroy'])
    ->middleware([AdminAccess::class])
    ->name('admin.logout');

Route::middleware([AdminAccess::class])->prefix('admin')->name('admin.')->group(function () {
    // Livewire SPA entry points for admin
    Route::get('management', ManagementPage::class)->name('management.index');

    // About page (SPA) - map GET routes used by tests/views to the Livewire component
    Route::get('about', AboutPage::class)->name('about.index');
    Route::get('about/edit', AboutPage::class)->name('about.edit');
    Route::get('about/create', AboutPage::class)->name('about.create');

    // Services SPA-managed via ServiceManagerPage. Provide GET routes for index/create/edit used by UI/tests.
    Route::get('services', ServiceManagerPage::class)->name('services.index');
    Route::get('services/create', ServiceManagerPage::class)->name('services.create');
    Route::get('services/{service}/edit', ServiceManagerPage::class)->name('services.edit');
});
