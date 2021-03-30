<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

// Public
Route::get('/', 'PublicController@index')->name('landing-page');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/auction', 'PublicController@auction')->name('auction');
Route::get('/contact', 'PublicController@contact')->name('contact');
Route::get('/term-of-use', 'PublicController@term_of_use')->name('term-of-use');

// Auth User
Auth::routes(['verify' => true]);
Route::get('/google', 'User\GoogleController@redirect');
Route::get('/callback', 'User\GoogleController@callback');

Route::get('/user', function () {
    return redirect(route('user.dashboard'));
});

// User
Route::name('user.')->prefix('user')->middleware('auth', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'User\UserController@index')->name('dashboard');
    // Trased
    Route::get('/trashed', 'User\UserController@trash')->name('trashed');
    Route::get('/restore/{id}', 'User\UserController@restore')->name('restore');
    // Profile
    Route::get('/profile', 'User\UserController@profile')->name('profile');
    Route::patch('/profile/{id}', 'User\UserController@profile_update');
    // Goodies
    Route::post('/goodies/export-filter', 'User\GoodsController@export_filter')->name('goodies.export_filter');
    Route::post('/dependent-dropdown-village', 'GoodsController@village')->name('goodies.village');
    Route::get('/goodies/export', 'User\GoodsController@export')->name('goodies.export');
    Route::resource('goodies', 'User\GoodsController', [
        'names' => [
            'index' => 'goodies'
        ]
    ]);
    // Auctions
    Route::get('/auctions/export', 'User\AuctionController@export')->name('auctions.export');
    Route::get('/my-auctions', 'User\AuctionController@my_auction')->name('my-auctions');
    Route::resource('auctions', 'User\AuctionController', [
        'names' => [
            'index' => 'auctions'
        ]
    ]);
});
