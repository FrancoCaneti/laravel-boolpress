<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/* Test API*/
Route::get('/test', function(){
    return response()->json([
         'names' => ['Franco','Luca','Daniel','Filippo'],
         'lorem'=> "ipsum"
       ]);
});

/* GET POST*/ 

Route::namespace('Api')->group(function() {
    //Get post
    Route::get('posts','PostController@index');
});

