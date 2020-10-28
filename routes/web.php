<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/valid', 'HomeController@valid')->name('home.valid');
Route::get('/validRequest', 'HomeController@validRequest')->name('home.validRequest');

Route::resource('/users', 'UserTagsController');
