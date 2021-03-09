<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
