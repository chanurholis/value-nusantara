<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.public.public-master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
