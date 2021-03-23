<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PublicController@index');

Route::get('/term-of-us', function () {
    return view('public.term-of-us');
});

Route::get('/admin', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/officer', function () {
    return redirect(route('officer.login'));
});

Auth::routes(['verify' => true]);

// Officer
Route::name('officer.')->prefix('officer')->group(function () {
    // Login
    Route::get('/login', 'OfficerLoginController@showLoginForm')->middleware('guest')->name('login');
    Route::post('/login', 'OfficerLoginController@login')->name('login');

    Route::get('/dashboard', function () {
        return 'Officer Dashboard';
    })->name('dashboard');
});

// Admin
Route::name('admin.')->prefix('admin')->middleware('auth', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    // Profile
    Route::get('/profile', function () {
        return view('admin.users.profile');
    })->name('profile');

    // Users
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);

    // Officers
    Route::resource('officers', 'OfficerController', [
        'names' => [
            'index' => 'officers'
        ]
    ]);

    // Goodies
    Route::resource('goodies', 'GoodsController', [
        'names' => [
            'index' => 'goodies'
        ]
    ]);

    // Auctions
    Route::resource('auctions', 'AuctionController', [
        'names' => [
            'index' => 'auctions'
        ]
    ]);
});
