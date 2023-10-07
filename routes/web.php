<?php

use Illuminate\Support\Facades\Route;
use App\Services\MailService;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use Illuminate\Http\Request;

use App\Http\Controllers\PostController;

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

Route::get('/', [
    PageController::class,
    "index",
])->name("index");

Route::get('/contacts', [
    PageController::class,
    "contacts",
])->name("contacts");

Route::get('/basket', [
    BasketController::class,
    "index",
])->name("basket");

Route::post('/basket/add', [
    BasketController::class,
    "add",
])->name("basket.add");

Route::post('/basket/remove', [
    BasketController::class,
    "remove"
])->name("basket.remove");

Route::post('/basket/checkout', [
    BasketController::class,
    'checkout'
])->name("basket.checkout");

// Route::resource('/posts', PostController::class);

Route::get('/testing', function(Request $request) {
    return view('testing');
})->name("debug");
