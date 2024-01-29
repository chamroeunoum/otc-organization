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
use App\Http\Controllers\Api\Admin\Regulator\RegulatorController;
use App\Http\Controllers\Api\Admin\Regulator\RegulatorParentController;
use App\Http\Controllers\Api\Admin\Regulator\TypeController;
use App\Http\Controllers\Api\Admin\Regulator\OrganizationController;
use App\Http\Controllers\Api\Admin\Regulator\PositionController;
use App\Http\Controllers\Api\Admin\Regulator\SignatureController;
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
            Route::get('regulators',[FolderController::class,'getRegulators']);

            Route::get('regulators',[ FolderController::class , 'regulators']);
            Route::put('regulators/add',[ FolderController::class , 'addRegulatorToFolder']);
            Route::put('regulators/remove',[ FolderController::class , 'removeRegulatorFromFolder']);
            Route::put('regulators/check',[ FolderController::class , 'checkRegulator']);
            Route::get('user',[ FolderController::class , 'user']);
            Route::get('list/regulator/validation',[ FolderController::class , 'listFolderWithRegulatorValidation']);

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
            Route::get('regulators',[OrganizationController::class,'getRegulators']);
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
            

            // Route::get('get/regulator/years','RegulatorController@getYears');
            Route::get('pdf',[RegulatorController::class,'pdf']);
            // Route::get('types/compact', "TypeController@compactList");
            Route::group([
                'prefix' => 'types' ,
                ], function() {
                    Route::get('compact', [TypeController::class,'compact']);
            });
            Route::group([
                'prefix' => 'signatures' ,
                ], function() {
                    Route::get('compact', [SignatureController::class,'compact']);
            });
            Route::group([
                'prefix' => 'organizations' ,
                ], function() {
                    Route::get('compact', [OrganizationController::class,'compact']);
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
            Route::get('',[RegulatorParentController::class,'index']);
            Route::get('child',[RegulatorParentController::class,'child']);
            Route::get('read',[RegulatorParentController::class,'read']);
            Route::post('',[RegulatorParentController::class,'create']);
            Route::put('',[RegulatorParentController::class,'update']);
            Route::put('linkregulator',[RegulatorParentController::class,'linkRegulator']);
            Route::delete('',[RegulatorParentController::class,'destroy']);
    });

    Route::group([
        'prefix' => 'organizations' ,
        ], function() {
            Route::get('',[OrganizationController::class,'index']);
            Route::get('compact', [OrganizationController::class,'compact']);
            Route::get('read',[OrganizationController::class,'read']);
            Route::post('',[OrganizationController::class,'create']);
            Route::put('',[OrganizationController::class,'update']);
            Route::put('{id}/activate',[OrganizationController::class,'activate']);
            Route::put('{id}/deactivate',[OrganizationController::class,'deactivate']);
            Route::delete('',[OrganizationController::class,'destroy']);

            Route::get('child',[OrganizationController::class,'child']);
            Route::post('upload',[OrganizationController::class,'upload']);
            
    });

    Route::group([
        'prefix' => 'positions' ,
        ], function() {
            Route::get('',[PositionController::class,'index']);
            Route::get('compact', [PositionController::class,'compact']);
            Route::get('read',[PositionController::class,'read']);
            Route::post('',[PositionController::class,'create']);
            Route::put('',[PositionController::class,'update']);
            Route::put('{id}/activate',[PositionController::class,'activate']);
            Route::put('{id}/deactivate',[PositionController::class,'deactivate']);
            Route::delete('',[PositionController::class,'destroy']);

            Route::get('child',[PositionController::class,'child']);
            Route::post('upload',[PositionController::class,'upload']);
            
    });

    /** FOLDER SECTION */
    // Route::group([
    //     'prefix' => 'folders' ,
    //     'namespace' => 'Api' ,
    //     'middleware' => 'auth:api'
    //     ], function() {
    //         Route::get('list','FolderController@index');
    //         Route::get('{folderId}/regulator/{regulatorId}/add','FolderController@addRegulatorToFolder');
    //         Route::get('{folderId}/regulator/{regulatorId}/remove','FolderController@removeRegulatorToFolder');
    //         Route::put('checkregulator','FolderController@checkRegulator');
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


    Route::group([
        'prefix' => 'books',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'BookController@index');
        Route::get('{id}', 'BookController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'BookController@structure')->where('id', '[0-9]+');
        Route::get('{id}/kunties', 'BookController@kunties')->where('id', '[0-9]+');
        Route::get('{id}/matikas', 'BookController@matikas')->where('id', '[0-9]+');
        Route::get('{id}/matras', 'MatraController@ofBook')->where('id', '[0-9]+');
        Route::get('exists', 'BookController@exists');
        /** Mini display */
        Route::get('compact', "BookController@compactList");
    
        Route::post('', 'BookController@store');
        Route::post('{id}/save/structure', 'BookController@saveStructure')->where('id', '[0-9]+');
        Route::post('removefile', 'BookController@removefile');
    
        Route::put('', 'BookController@update')->where('id', '[0-9]+');
        Route::post('upload', 'BookController@upload');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'BookController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'BookController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'BookController@delete')->where('id', '[0-9]+');
    });
    
    Route::group([
        'prefix' => 'books/kunties',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'KuntyController@index');
        Route::get('{id}', 'KuntyController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'KuntyController@structure')->where('id', '[0-9]+');
        Route::get('{id}/matikas', 'KuntyController@matikas')->where('id', '[0-9]+');
        Route::get('{id}/chapters', 'KuntyController@chapters')->where('id', '[0-9]+');
        Route::get('exists', 'KuntyController@exists');
        /** Mini display */
        Route::get('compact', "KuntyController@compactList");
    
        Route::post('', 'KuntyController@store');
        Route::post('{id}/save/structure', 'KuntyController@saveStructure')->where('id', '[0-9]+');
    
        Route::put('', 'KuntyController@update')->where('id', '[0-9]+');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'KuntyController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'KuntyController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'KuntyController@delete')->where('id', '[0-9]+');
    });
    
    Route::group([
        'prefix' => 'books/matikas',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'MatikaController@index');
        Route::get('{id}', 'MatikaController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'MatikaController@structure')->where('id', '[0-9]+');
        Route::get('{id}/chapters', 'MatikaController@chapters')->where('id', '[0-9]+');
        Route::get('exists', 'MatikaController@exists');
        /** Mini display */
        Route::get('compact', "MatikaController@compactList");
    
        Route::post('', 'MatikaController@store');
        Route::post('{id}/save/structure', 'MatikaController@saveStructure')->where('id', '[0-9]+');
    
        Route::put('', 'MatikaController@update')->where('id', '[0-9]+');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'MatikaController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'MatikaController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'MatikaController@delete')->where('id', '[0-9]+');
    });
    
    Route::group([
        'prefix' => 'books/chapters',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'ChapterController@index');
        Route::get('{id}', 'ChapterController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'ChapterController@structure')->where('id', '[0-9]+');
        Route::get('{id}/parts', 'ChapterController@parts')->where('id', '[0-9]+');
        Route::get('exists', 'ChapterController@exists');
        /** Mini display */
        Route::get('compact', "ChapterController@compactList");
    
        Route::post('create', 'ChapterController@store');
        Route::post('{id}/save/structure', 'ChapterController@saveStructure')->where('id', '[0-9]+');
    
        Route::post('update', 'ChapterController@update')->where('id', '[0-9]+');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'ChapterController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'ChapterController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'ChapterController@delete')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'books/parts',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'PartController@index');
        Route::get('{id}', 'PartController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'PartController@structure')->where('id', '[0-9]+');
        Route::get('{id}/sections', 'PartController@sections')->where('id', '[0-9]+');
        Route::get('exists', 'PartController@exists');
        /** Mini display */
        Route::get('compact', "PartController@compactList");
    
        Route::post('', 'PartController@store');
        Route::post('{id}/save/structure', 'PartController@saveStructure')->where('id', '[0-9]+');
    
        Route::put('', 'PartController@update')->where('id', '[0-9]+');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'PartController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'PartController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'PartController@delete')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'books/sections',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'SectionController@index');
        Route::get('{id}', 'SectionController@read')->where('id', '[0-9]+');
        Route::get('{id}/structure', 'SectionController@structure')->where('id', '[0-9]+');
        Route::get('exists', 'SectionController@exists');
        /** Mini display */
        Route::get('compact', "SectionController@compactList");
    
        Route::post('', 'SectionController@store');
        Route::post('{id}/save/structure', 'SectionController@saveStructure')->where('id', '[0-9]+');
    
        Route::put('', 'SectionController@update')->where('id', '[0-9]+');
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'SectionController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'SectionController@unactive')->where('id', '[0-9]+');
    
        Route::delete('{id}', 'SectionController@delete')->where('id', '[0-9]+');
    });

    Route::group([
        'prefix' => 'books/types',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'TypeController@index');
        Route::post('create', 'TypeController@store');
        Route::post('update', 'TypeController@update');
        Route::get('{id}/read', 'TypeController@read');
        Route::delete('{id}/delete', 'TypeController@delete');
        Route::get('{id}/structure', 'TypeController@structure');
        Route::post('{id}/save/structure', 'TypeController@saveStructure');
    
        Route::put('exists', 'TypeController@exists');
    
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'TypeController@active');
        Route::put('{id}/deactivate', 'TypeController@unactive');
    
        /** Mini display */
        Route::get('compact', "TypeController@compactList");
    });
    
    Route::group([
        'prefix' => 'books/matras',
        'namespace' => 'Api\Book' ,
        'middleware' => 'auth:api'
    ],function(){
        Route::get('', 'MatraController@index');
        Route::post('', 'MatraController@store');
        Route::put('', 'MatraController@update');
        Route::get('{id}', 'MatraController@read')->where('id', '[0-9]+');
        Route::delete('{id}', 'MatraController@delete')->where('id', '[0-9]+');
        Route::put('exists', 'MatraController@exists');
    
        /** Activate / Deactivate the data for using */
        Route::put('{id}/activate', 'MatraController@active')->where('id', '[0-9]+');
        Route::put('{id}/deactivate', 'MatraController@unactive')->where('id', '[0-9]+');
        /** Mini display */
        Route::get('compact', "MatraController@compactList");
    });

    Route::group([
        'prefix' => 'tasks',
        'namespace' => 'tasks' ,
        'middleware' => 'auth:api'
    ],function(){
        /**
         * Methods to apply for each of the CRUD operations
         * Create => POST
         * Read => GET
         * Update => PUT
         * Delete => DELETE
         */
    
        /**
         * Get all records
         */
        Route::get('',"TaskController@index")->name("taskList");
        /**
         * Get a record with id
         */
        Route::get('{id}/read',"TaskController@read")->name("taskRead");
        /**
         * Create a record
         */
        Route::post('',"TaskController@create")->name("taskCreate");
        /**
         * Update a reccord with id
         */
        Route::put('',"TaskController@update")->name("taskUpdate");
        /**
         * Delete a record
         */
        Route::delete('users',"TaskController@delete")->name("taskDelete");
    
        /**
         * Activate, Deactivate account
         */
        Route::put('activate','TaskController@activate')->name('taskActivate');
        Route::put('deactivate','TaskController@deactivate')->name('taskDeactivate');
    
        Route::put('start','TaskController@startTask')->name('taskStart');
        Route::put('end','TaskController@endTask')->name('taskEnd');
        Route::put('pending','TaskController@pendingTask')->name('taskPending');
        Route::put('continue','TaskController@continueTask')->name('taskContinue');
        /**
         * Get number of the tasks base on it status
         */
        Route::get('total_number_of_each_status',function(Request $request){
            return response()->json([
                'new' => \App\Models\Task\Task::getTotalNewTasks() ,
                'in_progress' => \App\Models\Task\Task::getTotalInProgressTasks() ,
                'pending' => \App\Models\Task\Task::getTotalPendingTasks() ,
                'ended' => \App\Models\Task\Task::getTotalEndedTasks()
            ],200);
        });
        Route::get('total_number_of_new',function(Request $request){
            return \App\Models\Task\Task::getTotalNewTasks();
        });
        Route::get('total_number_of_in_progress',function(Request $request){
            return \App\Models\Task\Task::getTotalInProgressTasks();
        });
        Route::get('total_number_of_pending',function(Request $request){
            return \App\Models\Task\Task::getTotalPendingTasks();
        });
        Route::get('total_number_of_ended',function(Request $request){
            return \App\Models\Task\Task::getTotalEndedTasks();
        });
        /**
         * Get total earn
         */
        Route::get('total_earn',function(){
            return \App\Models\Task\Task::getTotalEarn();
        });
        Route::get('total_earn_by_month_of_year/{date}',function(){
            return \App\Models\Task\Task::getTotalEarn($date);
        });
        Route::get('total_earn_between/{start}/{end}',function(){
            return \App\Models\Task\Task::getTotalEarn($start,$end);
        });
        /**
         * Get total expense
         */
        Route::get('total_expense',function(){
            return \App\Models\Task\Task::getTotalExpense();
        });
        Route::get('total_expense_by_month_of_year/{date}',function(){
            return \App\Models\Task\Task::getTotalExpenseByMonthOfYear($date);
        });
        Route::get('total_expense_between/{start}/{end}',function(){
            return \App\Models\Task\Task::getTotalExpenseBetween($start,$end);
        });
        /**
         * Get total expense and earn
         */
        /**
         * Total tasks, expense, earn by day
         */
        Route::get('total_tasks_earn_expense',function(Request $request){
            return response()->json([
                'new' => \App\Models\Task\Task::getTotalNewTasks() ,
                'progress' => \App\Models\Task\Task::getTotalInProgressTasks() ,
                'pending' => \App\Models\Task\Task::getTotalPendingTasks() ,
                'ended' => \App\Models\Task\Task::getTotalEndedTasks() ,
                'earn' => \App\Models\Task\Task::getTotalEarn() ,
                'expense' => \App\Models\Task\Task::getTotalExpense()
            ],200);
        });
        Route::get('total_tasks_earn_expense_by_day',function(Request $request){
            return response()->json([
                'new' => \App\Models\Task\Task::getNewTasks()->where('created_at','like',\Carbon\Carbon::now()->format('Y-m-d')."%")->count() ,
                'progress' => \App\Models\Task\Task::getInProgressTasks()->where('created_at','like',\Carbon\Carbon::now()->format('Y-m-d')."%")->count() ,
                'pending' => \App\Models\Task\Task::getPendingTasks()->where('created_at','like',\Carbon\Carbon::now()->format('Y-m-d')."%")->count() ,
                'ended' => \App\Models\Task\Task::getEndedTasks()->where('created_at','like',\Carbon\Carbon::now()->format('Y-m-d')."%")->count() ,
                'earn' => number_format( \App\Models\Task\Task::getTotalEarnBetween(\Carbon\Carbon::now()->format('Y-m-d'),\Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),2,'.',',' ) ,
                'expense' => number_format( \App\Models\Task\Task::getTotalExpenseBetween(\Carbon\Carbon::now()->format('Y-m-d'),\Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),2,'.',',' )
            ],200);
        });
    });

    require( 'admin/attendant.php' );
    require( 'admin/book.php' );

});
