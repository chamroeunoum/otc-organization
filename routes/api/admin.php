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

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\RegulatorController;
use App\Http\Controllers\Api\Admin\TypeController;


Route::group([
    'prefix' => 'admin' ,
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
        });
    });

    /** USER/ACCOUNT SECTION */
    Route::group([
        'prefix' => 'users' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[UserController::class,'index']);
            Route::post('create',[UserController::class,'store']);
            Route::put('update',[UserController::class,'update']);
            Route::get('{id}/read',[UserController::class,'read']);
            Route::delete('{id}/delete',[UserController::class,'destroy']);
            Route::put('activate',[UserController::class,'active']);
            Route::put('password/change',[UserController::class,'passwordChange']);
    });

    // I am here , please continue to the below lines

    /** SEARCH SECTION */
    Route::group([
        'prefix' => 'regulators' ,
        'namespace' => 'Api' ,
        'middleware' => 'api'
        ], function() {;
            Route::get('',[RegulatorController::class,'index']);
            Route::get('read',[RegulatorController::class,'read']);
            Route::post('',[RegulatorController::class,'create']);
            Route::put('',[RegulatorController::class,'update']);
            Route::delete('',[RegulatorController::class,'destroy']);

            // Route::get('get/document/years','RegulatorController@getYears');
            // Route::get('pdf','RegulatorController@pdf');
            // Route::get('types/compact', "TypeController@compactList");
            Route::group([
                'prefix' => 'types' ,
                ], function() {
                    Route::get('compact', [TypeController::class,'compactList']);
            });
            
            

    });
    /** FOLDER SECTION */
    // Route::group([
    //     'prefix' => 'folders' ,
    //     'namespace' => 'Api' ,
    //     'middleware' => 'auth:api'
    //     ], function() {
    //         Route::get('list','FolderController@index');
    //         Route::get('{folderId}/document/{documentId}/add','FolderController@addDocumentToFolder');
    //         Route::get('{folderId}/document/{documentId}/remove','FolderController@removeDocumentToFolder');
    //         Route::put('checkdocument','FolderController@checkDocument');
    //         Route::put('delete','FolderController@delete');
    //         Route::post('store','FolderController@store');
    //         Route::get('user','FolderController@user');
    // });
    /** SECTION OF DOCUMENT TYPE */
    // Route::group([
    //     'prefix' => 'types' ,
    //     'namespace' => 'Api' ,
    //     'middleware' => 'auth:api'
    //     ], function() {
    //         Route::get('','TypeController@index');
    // });

    /** SECTION OF MINISTRY */
    // Route::group([
    //     'prefix' => 'ministries' ,
    //     'namespace' => 'Api' ,
    //     'middleware' => 'auth:api'
    //     ], function() {
    //         Route::get('','MinistryController@index');
    // });

    /** PROFILE SECTION */
    // Route::group([
    //     'prefix' => 'profile',
    //     'namespace' => 'Api' ,
    //     'middleware' => 'auth:api'
    // ], function() {
    //     Route::get('/getAuthUser',
    //                 'ProfileController@getAuthUser');
    //     Route::put('/updateAuthUser',
    //                 'ProfileController@updateAuthUser');
    //     Route::put('/updateAuthUserPassword',
    //                 'ProfileController@updateAuthUserPassword');
    //     Route::post('/picture/upload','ProfileController@upload');
    // });

});
