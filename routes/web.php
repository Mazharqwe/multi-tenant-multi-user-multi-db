<?php

use Illuminate\Support\Facades\Route;


foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
        Route::get('/', function () {
            return view('welcome');
        });




    });
}



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
