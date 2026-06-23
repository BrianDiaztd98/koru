<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Livewire\LandingPage;
use App\Http\Middleware\AdminAccess;
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
    Route::resource('services', ServiceController::class);
    Route::get('management', [ManagementController::class, 'index'])->name('management.index');
    
    // About section routes (singleton pattern)
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about', [AboutController::class, 'store'])->name('about.store');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
    Route::delete('about', [AboutController::class, 'destroy'])->name('about.destroy');
});