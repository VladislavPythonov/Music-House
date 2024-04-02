<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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


Route::resource('products', ProductController::class);
Route::post('/products/filter', [ProductController::class, 'filter'])->name('products.filter');
// Route::post('/categories/filter', [CategoryController::class, 'filter'])->name('categories.filter');
Route::resource('categories', CategoryController::class)->middleware('admin');

Route::get('/', [CarouselController::class, 'index'])->name('index');

Route::resource('orders', OrderController::class)->middleware('auth');




// Route::get('/', [ProductController::class, 'showCarousel'])->name('showCarousel');
// Route::get('/', [ProductController::class, 'showProducts'])->name('showProducts');

// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');



Route::get('/register', [AuthController::class, 'regForm'])->name('regForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::post('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/sql', [SqlController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::get('/cart/add/{product_id}', [CartController::class, 'store'])->name('cart.store')->middleware('auth');
Route::post('cart/change/{product_id}', [CartController::class, 'change'])->name('cart.change')->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');



Route::get('/register', [AuthController::class, 'regForm'])->name('regForm')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
