<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\WhyChooseUsTitleController;


// Admin login Route
Route::group(['middleware' => 'guest'], function() {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function(){

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashbaord');
  
    // Profile Routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/reset-password', [AdminAuthController::class, 'update'])->name('password.update');

    // Slider Routes
    Route::resource('slider', SliderController::class);

    // Why Choose Us Routes
    Route::put('why-choose-title-update', [WhyChooseUsTitleController::class, 'update'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

    // Product Category Routes
    Route::resource('category', CategoryController::class);

    // Product Routes
    Route::resource('product', ProductController::class);

    // Product Gallery Routes
    // Route::resource('product-gallery', ProductController::class);

});
