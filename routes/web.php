<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public
Route::get('/', 'PublicController@index')->name('landing-page');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/auction', 'PublicController@auction')->name('auction');
Route::get('/contact', 'PublicController@contact')->name('contact');
Route::get('/term-of-use', 'PublicController@term_of_use')->name('term-of-use');

// Auth User
Auth::routes(['verify' => true]);

// OAuth Google
Route::get('/google', 'User\GoogleController@redirect');
Route::get('/callback', 'User\GoogleController@callback');

// Auth Officer
Route::name('officer.')->prefix('officer')->middleware('guest')->group(function () {
    Route::get('/login', 'Auth\OfficerLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\OfficerLoginController@login')->name('login');
    Route::post('/logout', 'Auth\OfficerLoginController@logout')->name('logout');
});

// Officer
Route::name('officer.')->prefix('officer')->middleware('auth:officer', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'Officer\OfficerController@index')->name('dashboard');
    // Lelang
    Route::get('/auction-request', 'Officer\AuctionController@index')->name('auction-request');
    Route::get('/auction-request/{id}', 'Officer\AuctionController@show')->name('auction-request.detail');
    Route::patch('/auction-request/{id}', 'Officer\AuctionController@update')->name('auction-request.update');
    // Profile
    Route::get('/profile', 'Officer\OfficerController@profile')->name('profile');
    Route::patch('/profile/{id}', 'Officer\OfficerController@profile_update');
});

// Admin
Route::name('admin.')->prefix('admin')->middleware('auth:officer', 'verified')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    // Officer
    Route::resource('officers', 'OfficerController', ['names' => ['index' => 'officers']]);
    // User
    Route::resource('users', 'UserController', ['names' => ['index' => 'users']]);
    // Profile
    Route::get('/profile', 'Officer\OfficerController@profile')->name('profile');
    Route::patch('/profile/{id}', 'Officer\OfficerController@profile_update');
});

// User
Route::get('/user', function () {
    return redirect(route('user.dashboard'));
});

// User
Route::name('user.')->prefix('user')->middleware('auth', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'User\UserController@index')->name('dashboard');
    // Trashed
    Route::get('/trashed', 'User\UserController@trash')->name('trashed');
    Route::get('/restore/{id}', 'User\UserController@restore')->name('restore');
    // Profile
    Route::get('/profile', 'User\UserController@profile')->name('profile');
    Route::patch('/profile/{id}', 'User\UserController@profile_update');
    // Goodies
    Route::post('/dependent-dropdown', 'User\GoodsController@origin_of_goods')->name('dependent-dropdown');
    Route::post('/goodies/export-filter', 'User\GoodsController@export_filter')->name('goodies.export_filter');
    Route::get('/goodies/export', 'User\GoodsController@export')->name('goodies.export');
    Route::resource('goodies', 'User\GoodsController', ['names' => ['index' => 'goodies']]);
    // Auctions
    Route::get('/auctions/export', 'User\AuctionController@export')->name('auctions.export');
    Route::get('/my-auctions', 'User\AuctionController@my_auction')->name('my-auctions');
    Route::get('/auctions/{id}/detail', 'User\AuctionController@auction_detail')->name('auction-detail');
    Route::post('/auctions/{id}/follow', 'User\AuctionController@auction_follow')->name('auction-follow');
    Route::resource('auctions', 'User\AuctionController', ['names' => ['index' => 'auctions']]);
    Route::patch('/auctions/{id}/bid', 'User\AuctionController@bid')->name('auction-bid');
    // Auction Requirement
    Route::get('/auction-requiremen/identity-card', 'AuctionRequirementController@identity_card')->name('identity-card');
    Route::patch('/auction-requiremen/identity-card', 'AuctionRequirementController@identity_card_update')->name('identity-card');
    Route::post('/dependent-dropdown/province', 'AuctionRequirementController@city')->name('city');
    Route::post('/dependent-dropdown/district', 'AuctionRequirementController@district')->name('district');
    Route::post('/dependent-dropdown/village', 'AuctionRequirementController@village')->name('village');
    Route::get('/auction-requiremen/npwp', 'AuctionRequirementController@npwp')->name('npwp');
    Route::get('/auction-requiremen/bank-account', 'AuctionRequirementController@bank_account')->name('bank');
    // Auctions History
    Route::resource('/auction-histories', 'User\AuctionHistoryController', ['names' => ['index' => 'auction-histories']]);
    Route::patch('/auction-histories/{id}', 'User\AuctionHistoryController@update')->name('bid');
});
