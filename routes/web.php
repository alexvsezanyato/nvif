<?php

use Illuminate\Support\Facades\Route;
use App\Services\MailService;
use App\Http\Controllers\FormController;

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

Route::get('/test/mail-request', function () {

    return view('mail.request', [
        "email" => "alo-alo@gmail.com",
        "name" => "Alex",
        "phone" => "8 (800) 555-35-35"
    ]);
});

Route::post('/form/request', [FormController::class, 'requestAction']);

if (false) Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('main');
});

Route::get('/contacts', function () {
    return view('contacts');
});
