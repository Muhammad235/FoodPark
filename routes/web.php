<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\WebPageController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Web\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebPageController::class, 'index']);


/** Authenticated user routes **/
// Route::get('product/{slug}', [WebPageController::class, ''])->name('product.show');


/** Authenticated user routes **/
// Route::get('load-product-modal/{product:id}', [WebPageController::class, '']);


/** Authenticated user routes **/
Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [PasswordController::class, 'update'])->name('password.update');
    Route::put('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

require __DIR__.'/auth.php';
