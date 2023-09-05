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
use App\Http\Controllers\Api\Admin\FolderController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\Document\RegulatorController;
use App\Http\Controllers\Api\Admin\Document\DocumentParentController;
use App\Http\Controllers\Api\Admin\Document\TypeController;
use App\Http\Controllers\Api\Admin\Document\OrganizationController;
use App\Http\Controllers\Api\Admin\ProfileController;


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
            Route::put('authenticated',[ProfileController::class,'updateAuthUser']);
            Route::get('{id}/read',[UserController::class,'read']);
            Route::delete('{id}/delete',[UserController::class,'destroy']);
            Route::put('activate',[UserController::class,'active']);
            Route::put('password/change',[UserController::class,'passwordChange']);
            /**
             * Check the unique user information
             */
            Route::get('username/exist',[UserController::class,'checkUsername']);
            Route::get('phone/exist',[UserController::class,'checkPhone']);
            Route::get('email/exist',[UserController::class,'checkEmail']);
            Route::post('upload',[UserController::class,'upload']);
    });

    /** FOLDER SECTION */
    Route::group([
        'prefix' => 'folders' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[FolderController::class,'index']);
            Route::post('create',[FolderController::class,'store']);
            Route::put('update',[FolderController::class,'update']);
            Route::get('{id}/read',[FolderController::class,'read']);
            Route::delete('{id}/delete',[FolderController::class,'destroy']);
            Route::put('activate',[FolderController::class,'active']);
            /**
             * Check the unique user information
             */
            Route::get('subfolders',[FolderController::class,'getSubfolders']);
            Route::get('documents',[FolderController::class,'getDocuments']);

            Route::get('regulators',[ FolderController::class , 'regulators']);
            Route::put('regulators/add',[ FolderController::class , 'addDocumentToFolder']);
            Route::put('regulators/remove',[ FolderController::class , 'removeDocumentFromFolder']);
            Route::put('regulators/check',[ FolderController::class , 'checkDocument']);
            Route::get('user',[ FolderController::class , 'user']);
            Route::get('list/document/validation',[ FolderController::class , 'listFolderWithDocumentValidation']);

            Route::put('{id}/accessibility',[FolderController::class,'accessibility']);

    });

    /** ORGANIZATION SECTION */
    Route::group([
        'prefix' => 'organizations' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[OrganizationController::class,'index']);
            Route::post('create',[OrganizationController::class,'store']);
            Route::post('addchild',[OrganizationController::class,'addChild']);
            Route::put('update',[OrganizationController::class,'update']);
            Route::get('{id}/read',[OrganizationController::class,'read']);
            Route::delete('{id}/delete',[OrganizationController::class,'destroy']);
            Route::put('activate',[OrganizationController::class,'active']);
            /**
             * Check the unique user information
             */
            Route::get('children',[OrganizationController::class,'getChildren']);
            Route::get('documents',[OrganizationController::class,'getDocuments']);
            Route::get('staffs',[ OrganizationController::class , 'staffs']);
    });

    /** ROLE SECTION */
    Route::group([
        'prefix' => 'roles' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[RoleController::class,'index']);
            Route::post('create',[RoleController::class,'store']);
            Route::put('update',[RoleController::class,'update']);
            Route::get('{id}/read',[RoleController::class,'read']);
            Route::delete('{id}/delete',[RoleController::class,'destroy']);
    });

    // I am here , please continue to the below lines

    /** SEARCH SECTION */
    Route::group([
        'prefix' => 'regulators' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {;
            Route::get('',[RegulatorController::class,'index']);
            Route::get('child',[RegulatorController::class,'child']);
            Route::get('read',[RegulatorController::class,'read']);
            Route::post('',[RegulatorController::class,'create']);
            Route::put('',[RegulatorController::class,'update']);
            Route::put('{id}/activate',[RegulatorController::class,'activate']);
            Route::put('{id}/deactivate',[RegulatorController::class,'deactivate']);
            Route::delete('',[RegulatorController::class,'destroy']);
            Route::post('upload',[RegulatorController::class,'upload']);
            

            // Route::get('get/document/years','RegulatorController@getYears');
            Route::get('pdf',[RegulatorController::class,'pdf']);
            // Route::get('types/compact', "TypeController@compactList");
            Route::group([
                'prefix' => 'types' ,
                ], function() {
                    Route::get('compact', [TypeController::class,'compactList']);
            });

            Route::put('addreader',[RegulatorController::class,'addReaders']);
            Route::put('removereader',[RegulatorController::class,'removeReaders']);
            Route::put('{id}/accessibility',[RegulatorController::class,'accessibility']);
            
            Route::group([
                'prefix' => 'oknha'
                ], function(){
                    Route::get('', [RegulatorController::class,'oknha'] );
                }
            );

    });

    Route::group([
        'prefix' => 'orgchart' ,
        'namespace' => 'Api' ,
        'middleware' => 'api'
        ], function() {;
            Route::get('',[DocumentParentController::class,'index']);
            Route::get('child',[DocumentParentController::class,'child']);
            Route::get('read',[DocumentParentController::class,'read']);
            Route::post('',[DocumentParentController::class,'create']);
            Route::put('',[DocumentParentController::class,'update']);
            Route::put('linkdocument',[DocumentParentController::class,'linkDocument']);
            Route::delete('',[DocumentParentController::class,'destroy']);
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
