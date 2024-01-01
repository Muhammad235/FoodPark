<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;


// Admin login Route
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function(){

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashbaord');
  
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});
