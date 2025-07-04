<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
//use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    \App\Http\Middleware\InitializeTenancyByUser::class,
    \App\Http\Middleware\PreventAccessFromSuperAdmin::class,
])->group(function () {
    Route::get('/abc', function () {
       return \App\Models\User::all();

        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    Route::get('/get-users', [App\Http\Controllers\HomeController::class, 'getUsers'])->name('users');

});
