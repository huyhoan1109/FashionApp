<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\PaymentsController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/checkout', function (){
    return view('checkout');
})->name('checkout');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/wishlist', function () {
    return view('home');
})->name('wishlist');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/help', function() {
    return view('help');
})->name('help');

Route::get('/item', function () {
    return view('home');
})->name('item');

// ----------------------------- Login ----------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->name('logout');
});
// ----------------------------- Register ----------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// ----------------------------- Forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forget-password', 'getEmail')->name('forget-password');
    Route::post('/forget-password', 'postEmail')->name('forget-password');    
});

// ----------------------------- Forget password ----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'getPassword')->name('reset-password');
    Route::post('/reset-password', 'updatePassword')->name('reset-password');    
});

// ----------------------------- User ----------------------------//
Route::prefix('/users')->name('users.')->controller(UsersController::class)->group(
    function(){
        Route::get('/', 'show')->name('show');
        Route::get('/change_password', 'change_password')->name('change_password');
        Route::post('/change_password', 'update_password')->name('update_password');
    }
)->name('users');

// ----------------------------- Cart ----------------------------//
Route::prefix('/cart')->name('cart.')->controller(cartController::class)->group(
    function(){
        Route::post('/remove','remove')->name('remove');
        Route::post('/add', 'add')->name('add');
    }
)->name('cart');

// ----------------------------- Admin ----------------------------//
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->name('admin.')->controller(AdminController::class)->group(
    function(){
        Route::get('/dashboard', 'dashboard');
    }
);