<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Middleware\Test;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::group(['prefix' => '/customer', 'middleware' => 'middleware'], function () {
        Route::get('/home', [CustomerController::class, 'home'])->name('customer#home');
        Route::get('/about', [CustomerController::class, 'about'])->name('customer#about');
        Route::get('/contact', [CustomerController::class, 'contact'])->name('customer#contact');
    });

    Route::get('/customer/order', [CustomerController::class, 'order'])->name('customer#order');
});



// how to creat middelware ?
// 1. middleware create | 2. declare middleware at karnel | 3. use middleware
// command => php artisan make:middleware name

Route::middleware(Test::class)->group(function () {
    Route::get('/one', function () {
        return 'one';
    });

    Route::get('/two', function () {
        return 'two';
    })->middleware('testing_middleware');
});

Route::get('/three', function () {
    return 'three';
});

// cover middleware

Route::get('six', function () {
    return 'six';
})->middleware('testing_middleware');

Route::get('/customer/order', [CustomerController::class, 'order'])->name('customer#order');
