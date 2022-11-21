<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PaymentsController;
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

Route::get('/help', function() {
    return view('help');
})->name('help');

Route::prefix('/users')->name('users.')->middleware('auth')->group(
    function(){
        Route::get('/', [UsersController::class, 'show'])->name('show');
        Route::get('/change_password', [UsersController::class, 'change_password'])->name('change_password');
        Route::post('/change_password', [UsersController::class, 'update_password'])->name('update_password');
    }
)->name('users');
Route::prefix('/items', ItemsController::class);
Route::prefix('/payments', PaymentsController::class);
Route::prefix('/carts', CartsController::class);

require __DIR__.'/auth.php';
