<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//rotte autenticazione
Auth::routes();

//rotte aministrazione
//Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')
  ->namespace('Admin')
  ->middleware('auth')
  ->name('admin.')
  ->group(function(){
    //rotte home admin
       Route::get('/','HomeController@index')->name('home');


       //rotte post
       Route::resource('/posts','PostController');
  });

  //Front Office
  Route::get('{any?}', function () {
    return view('guest.home');
})->where("any",".*");

