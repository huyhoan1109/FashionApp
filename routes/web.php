<?php
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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


// ----------------------------- Home ----------------------------//
Route::get('/', function () {
    if(!Session::has('key')){
        $user = new User();
        $user->firstname = "";
        $user->lastname = "";
        $user->type = 2;
        $user->email = Str::random(8)."@gmail.com";
        $user->password = Str::random(8);
        Session::put('key', $user);
        $user->save();
    }
    return view('home');
})->name('home');

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
Route::prefix('/user')->name('user.')->middleware(['auth'])->controller(UserController::class)->group(
    function(){
        Route::get('/', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
        Route::post('/track', 'track')->name('track');
    }
)->name('user');

// ----------------------------- Checkout ----------------------------//
Route::get('/checkout', function(){return view('checkout');})->name('checkout');


// ----------------------------- Contact ----------------------------//
Route::get('/contact', function(){return view('contact');})->name('contact');


// ----------------------------- Privacy - Policy ----------------------------//
Route::get('/privacy-policy', function(){return view('privacy-policy');})->name('privacy-policy');


// ----------------------------- Shop ----------------------------//
Route::get('/shop', [ShopController::class, 'show'])->name('shop');


// ----------------------------- Wishlist ----------------------------//
Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');


// ----------------------------- Item ----------------------------//
Route::get('/item-detail/{item_id}', [ItemController::class, 'itemDetail'])->name('item-detail');


// ----------------------------- Item configuration ----------------------------//
Route::prefix('/item')->middleware(['auth', 'isAdmin'])->name('item.')->controller(ItemController::class)->group(
    function(){
        Route::post('/add','addItem')->name('add');
        Route::post('/fix','fixItem')->name('fix');
        Route::post('/delete','deleteItem')->name('delete');
    }
)->name('item');

// ----------------------------- Cart ----------------------------//
Route::get('/cart', function(){return view('cart');})->name('cart');

// ----------------------------- Admin ----------------------------//
Route::prefix('/admin')->name('admin.')->middleware(['auth', 'isAdmin'])->controller(AdminController::class)->group(
    function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/category/{category_id}', 'ShowCategory')->name('categories');
        Route::get('/orders', 'Order')->name('orders');
        Route::get('/orders/{order_id}', 'OrderDetail')->name('ordersdetails');
        Route::get('/products', 'ShowProduct')->name('products');
        Route::get('/product/add', 'AddProduct')->name('product.add');
        Route::get('/product/edit/{product_id}', 'EditProduct')->name('product.edit');
        Route::get('/users', 'ShowUsers')->name('users');
        Route::get('/user/detail/{user_id}', 'UserDetail')->name('user.detail');
        Route::get('/user/add', 'AddUser')->name('user.add');
        Route::get('/user/edit/{user_id}', 'EditUser')->name('user.edit');
        Route::get('/coupons', 'Coupon')->name('coupons');
        Route::get('/coupon/add', 'AddCoupon')->name('coupon.add');
    }
)->name('admin');