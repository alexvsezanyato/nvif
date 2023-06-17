<?php

use Illuminate\Support\Facades\Route;
use App\Services\MailService;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;

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

Route::get('/', [PageController::class, "index"]);
Route::get('/contacts', [PageController::class, "contacts"]);
Route::get('/basket', [BasketController::class, "index"]);

Route::post('/basket/add', [BasketController::class, "add"]);
Route::post('/basket/remove', [BasketController::class, "remove"]);
Route::post('/form/request', [FormController::class, 'requestAction']);

Route::get('/test/mail-request', function () {
    return view('mail.request', [
        "email" => "alo-alo@gmail.com",
        "name" => "Alex",
        "phone" => "8 (800) 555-35-35"
    ]);
});
