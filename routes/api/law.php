<?php

use Illuminate\Http\Request;

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
use App\Http\Controllers\Api\Meeting\AuthController;
use App\Http\Controllers\Api\Meeting\UserController;
use App\Http\Controllers\Api\Meeting\ProfileController;
use App\Http\Controllers\Api\Law\Book\BookController;
use App\Http\Controllers\Api\Law\Book\TelegramController;



Route::group([
    'prefix' => 'law' ,
    'api'
  ],function(){

    /** SIGNING SECTION */
    Route::group([
      'prefix' => 'authentication'
    ], function () {
      Route::post('login', [AuthController::class,'login']);

      Route::group([
        'middleware' => 'auth:api'
      ], function() {
          Route::post('logout', [AuthController::class,'logout']);
          Route::get('user', [AuthController::class,'user']);
          Route::put('password/change',[UserController::class,'passwordChange']);
      });
    });

    Route::group([
      'prefix' => 'books' ,
      'middleware' => 'auth:api'
    ],function(){
      Route::get('',[BookController::class,'index']);
      Route::get('{id}/read',[BookController::class,'read']);
      Route::get('{id}/kunties',[BookController::class,'kunties']);
      Route::get('{id}/matikas',[BookController::class,'matikas']);
      Route::get('{id}/chapters',[BookController::class,'chapters']);
      Route::get('{id}/parts',[BookController::class,'parts']);
      Route::get('{id}/sections',[BookController::class,'sections']);
      Route::get('{id}/matras',[BookController::class,'matras']);
      Route::get('{id}/structure',[BookController::class,'structure']);
    });

    Route::group([
      'prefix' => 'telegram' ,
      'middleware' => 'api'
    ],function(){
      Route::post('webhook', [TelegramController::class,'handleWebhook']);
      Route::get('getupdates',[TelegramController::class,'getUpdates']);
    });
});