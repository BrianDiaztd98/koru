<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ServiceController;
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
});
