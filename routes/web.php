<?php
use App\Models\User;
use App\Models\Item;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController; 
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Livewire\SearchComponent;

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
    if(!Session::has('key')){
        $user = new User();
        $user->email = "noreply".User::where('type', 2)->count()."@gmail.com";
        $user->firstname = "";
        $user->lastname = "";
        $user->type = 2;
        $user->password = Str::random(15);
        Session::put('key', $user);
        $user->save();
    }
    return view('home');
})->name('home');

Route::get('/checkout', function (){
    return view('checkout');
})->name('checkout');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

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

// ----------------------------- Reset password ----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'getPassword')->name('reset-password');
    Route::post('/reset-password', 'updatePassword')->name('reset-password');    
});

// ----------------------------- User ----------------------------//
Route::prefix('/users')->name('users.')->middleware(['auth'])->controller(UserController::class)->group(
    function(){
        Route::get('/', 'show')->name('show');
        Route::post('/update', 'update')->name('update');
        Route::post('/track', 'track')->name('track');
    }
)->name('users');

// ----------------------------- Cart ----------------------------//
Route::get('/cart', function () { return view('cart');})->name('cart');
// ----------------------------- Shop ----------------------------//
Route::get('/shop', [ShopController::class, 'show'])->name('shop');
// ----------------------------- Wishlist ----------------------------//
Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');

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