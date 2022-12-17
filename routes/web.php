<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PaymentsController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController; 

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

// Middleware
Route::group(
    ['middleware'=>'auth'],
    function(){
        Route::get('home',function()
        {
            return view('home');
        });
        Route::get('home',function()
        {
            return view('home');
        });
    }
);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/item', function () {
    return view('home');
})->name('item');

Route::get('/checkout', function (){
    return view('checkout');
})->name('checkout');

Route::get('/wishlist', function () {
    return view('home');
})->name('wishlist');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/payment', function () {
    return view('home');
})->name('payment');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/help', function() {
    return view('help');
})->name('help');

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

Route::prefix('/users')->name('users.')->group(
    function(){
        Route::get('/', [UsersController::class, 'show'])->name('show');
        Route::get('/change_password', [UsersController::class, 'change_password'])->name('change_password');
        Route::post('/change_password', [UsersController::class, 'update_password'])->name('update_password');
    }
)->name('users');

Route::prefix('/items', ItemsController::class);
Route::prefix('/payments', PaymentsController::class);
Route::prefix('/carts', CartsController::class);