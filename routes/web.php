<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'show');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/booking/{package:slug}', 'pending');
        Route::post('/booking/{package:slug}', 'book');
    });

});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('admin')->group(function () {

    Route::redirect('/', '/admin/dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/orders', function () {
        return view('admin.orders');
    })->name('admin.orders');

});

Route::controller(PackageController::class)->group(function () {
    Route::get('/packages', 'index');
    Route::get('/packages/{package:slug}', 'show');

    Route::middleware('auth')->group(function () {
        Route::post('/packages/{package}/favourite', 'favourite')->name('packages.favourite');

        Route::delete('/packages/{package}/unfavourite', 'unfavourite')->name('packages.unfavourite');
    });
});

Route::middleware('guest')->group(function () {



    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });
});


Route::controller(SessionController::class)->group(function () {
    Route::delete('/logout', 'destroy')->middleware('auth');
    Route::middleware('guest')->group(function () {
        Route::post('/login', 'store')->name('login.store');
        Route::get('/login', 'create')->name('login');
    });
});