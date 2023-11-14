<?php

use Illuminate\Support\Facades\Route;
use App\Services\MailService;

use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\BasketController as Basket;
use App\Http\Controllers\CatalogController as Catalog;
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

Route::controller(Page::class)->group(
    function() {
        Route::get('/', 'index')->name('index');
        Route::get('/contacts', 'contacts')->name('contacts');
    }
);

Route::prefix('catalog')->controller(Catalog::class)->group(
    function() {
        Route::get('/', 'index')->name('basket');
    }
);

Route::prefix('basket')->controller(Basket::class)->group(
    function() {
        Route::get('/', 'index')->name('basket');

        Route::post('/add', 'add')->name('basket.add');
        Route::post('/remove', 'remove')->name('basket.remove');
        Route::post('/checkout', 'checkout')->name('basket.checkout');
    }
);
