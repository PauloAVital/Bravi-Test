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

Route::get('/contatoCreate', 'UserTagsController@createContato')->name('contato.create');
Route::get('/PessoaUpdate/{id}', 'Api\ControllerPessoa@pessoaUpdate');
Route::get('/updatePessoa', 'Api\ControllerPessoa@updatePessoa');

Route::get('/ContatoUpdate/{id}', 'Api\ControllerContato@ContatoUpdate');
Route::get('/updateContato', 'Api\ControllerContato@updateContato');


Route::resource('/users', 'UserTagsController');
