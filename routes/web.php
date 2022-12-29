<?php
use App\Models\User;
use App\Models\Item;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController; 
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
    if (! Session::has('key')){
        $user = new User();
        $user->firstname = Str::random(15);
        $user->lastname = Str::random(15);
        $user->email = 'noreply'.User::where('type', 2)->count().'gmail.com';
        $user->password = Str::random(15);
        $user->address = 'Ha Noi';
        $user->phone = 0000000000;
        $user->type = 2; # user vang lai
        $user->save();
        Session::put('key', $user);
    }
    $items = Item::all();
    return view('home', compact('items'));
})->name('home');

Route::get('/checkout', function (){
    return view('checkout');
})->name('checkout');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/wishlist', function () {
    return view('wishlist');
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

// ----------------------------- Reset password ----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'getPassword')->name('reset-password');
    Route::post('/reset-password', 'updatePassword')->name('reset-password');    
});

// ----------------------------- User ----------------------------//
Route::prefix('/users')->name('users.')->controller(UsersController::class)->group(
    function(){
        Route::get('/', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
    }
)->name('users');

Route::controller(ShopController::class)->group(function () {
    Route::get('/shop', 'show')->name('shop');
    Route::get('/search/{query}', 'search')->name('search');
});

// ----------------------------- Cart ----------------------------//
Route::prefix('/cart')->name('cart.')->controller(CartController::class)->group(
    function(){
        Route::post('/add', 'addCart')->name('add');
        Route::post('/remove','removeCart')->name('remove');
    }
)->name('cart');

Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');
Route::prefix('/wishlist')->name('wishlist.')->controller(WishlistController::class)->group(
    function(){
        Route::post('/add', 'add')->name('add');
        Route::post('/remove','remove')->name('remove');
    }
)->name('wishlist');
// ----------------------------- Item ----------------------------//
Route::get('/item-detail/{item_id}', [ItemController::class, 'itemDetail'])->name('item-detail');
Route::prefix('/item')->name('item.')->controller(ItemController::class)->group(
    function(){
        Route::post('/add','addItem')->name('add');
        Route::post('/fix','fixItem')->name('fix');
        Route::post('/delete','deleteItem')->name('delete');
    }
)->name('item');

// ----------------------------- Admin ----------------------------//
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->name('admin.')->controller(AdminController::class)->group(
    function(){
        Route::get('/dashboard', 'index');
    }
);