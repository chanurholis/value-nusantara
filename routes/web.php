<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Auth::routes(['verify' => true]);

Route::name('admin.')->prefix('admin')->middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

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
});
