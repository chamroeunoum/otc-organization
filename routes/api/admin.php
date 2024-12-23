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
use App\Http\Controllers\Api\Admin\PeopleController;
use App\Http\Controllers\Api\Admin\FolderController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\Regulator\RegulatorController;
use App\Http\Controllers\Api\Admin\Regulator\LegalDraftController;
use App\Http\Controllers\Api\Admin\Regulator\RegulatorParentController;
use App\Http\Controllers\Api\Admin\Regulator\TypeController;
use App\Http\Controllers\Api\Admin\Regulator\SignatureController;
use App\Http\Controllers\Api\Admin\Regulator\OrganizationController;
use App\Http\Controllers\Api\Admin\Regulator\CountesyController;
use App\Http\Controllers\Api\Admin\Regulator\PositionController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\Task\TaskController;

use App\Http\Controllers\Api\Admin\Law\Book\BookController;
use App\Http\Controllers\Api\Admin\Law\Book\KuntyController;
use App\Http\Controllers\Api\Admin\Law\Book\MatikaController;
use App\Http\Controllers\Api\Admin\Law\Book\PartController;
use App\Http\Controllers\Api\Admin\Law\Book\SectionController;
use App\Http\Controllers\Api\Admin\Law\Book\MatraController;
use App\Http\Controllers\Api\Admin\Law\Book\TypeController AS BookTypeController;


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
            Route::put('passcode',[UserController::class,'updatePasscode']);
            Route::delete('{id}/delete',[UserController::class,'destroy']);
            Route::put('activate',[UserController::class,'active']);
            Route::put('password/change',[UserController::class,'passwordChange']);
            Route::post('upload/picture',[UserController::class,'uploadPicture']);
            Route::post('upload/pdf',[UserController::class,'uploadPdf']);
            Route::get('pdf',[UserController::class,'pdf']);

            // Use to check the account does exist or not base on the phone or email or officer_identification_number
            Route::get('checkidentification/{term}/{type}',[UserController::class,'checkIdentification']);
            
            /**
             * Check the unique user information
             */
            Route::get('username/exist',[UserController::class,'checkUsername']);
            Route::get('phone/exist',[UserController::class,'checkPhone']);
            Route::get('email/exist',[UserController::class,'checkEmail']);
            Route::post('upload',[UserController::class,'upload']);
    });
    Route::group([
        'prefix' => 'users' ,
        'namespace' => 'Api' ,
        'middleware' => 'api'
        ], function() {
        Route::get('checkidentification/{term}/{type}',[UserController::class,'checkIdentification']);
    });

    /** PEOPLE / USER INFORMATION SECTION */
    Route::group([
        'prefix' => 'people' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[PeopleController::class,'index']);
            Route::post('create',[PeopleController::class,'store']);
            Route::put('update',[PeopleController::class,'update']);
            Route::get('{id}/read',[PeopleController::class,'read']);
            Route::delete('{id}/delete',[PeopleController::class,'destroy']);
            Route::put('update_organization_code',[PeopleController::class,'updateOrganizationCode']);
            Route::put('activate',[PeopleController::class,'active']);
            Route::put('deactivate',[PeopleController::class,'unactive']);
            Route::post('upload/picture',[PeopleController::class,'uploadPicture']);
            Route::post('upload/pdf',[PeopleController::class,'uploadPdf']);
            Route::get('pdf',[PeopleController::class,'pdf']);
    });

    /** PEOPLE / USER INFORMATION SECTION */
    Route::group([
        'prefix' => 'people' ,
        'namespace' => 'Api' ,
        'middleware' => 'api'
        ], function() {
            Route::get('{id}/read',[PeopleController::class,'read']);
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
            Route::get('compact',[OrganizationController::class,'compact']);
            Route::get('listbyparent',[OrganizationController::class,'listByParent']);
            Route::post('create',[OrganizationController::class,'store']);
            Route::post('addchild',[OrganizationController::class,'addChild']);
            Route::put('update',[OrganizationController::class,'update']);
            Route::get('{id}/read',[OrganizationController::class,'read']);
            Route::delete('{id}/delete',[OrganizationController::class,'destroy']);
            Route::put('activate',[OrganizationController::class,'active']);
            Route::put('deactivate',[OrganizationController::class,'unactive']);
            /**
             * Check the unique user information
             */
            Route::get('children',[OrganizationController::class,'getChildren']);
            Route::get('regulators',[OrganizationController::class,'getRegulators']);
            Route::get('staffs',[ OrganizationController::class , 'staffs']);
            Route::get('{id}/people',[ OrganizationController::class , 'people']);
            Route::put('setleader',[ OrganizationController::class , 'setLeader']);
            Route::put('addstaff',[ OrganizationController::class , 'addPeopleToOrganization']);

            Route::post('upload/picture',[OrganizationController::class,'uploadPicture']);
            Route::post('upload/pdf',[OrganizationController::class,'uploadPdf']);
            Route::get('pdf',[OrganizationController::class,'pdf']);

    });
    Route::group([
        'prefix' => 'organizations' ,
        'namespace' => 'Api' ,
        'middleware' => 'api'
        ], function() {
        Route::get('{id}/read',[OrganizationController::class,'read']);
    });

    /** POSITION SECTION */
    Route::group([
        'prefix' => 'positions' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[PositionController::class,'index']);
            Route::get('compact',[PositionController::class,'compact']);
            Route::get('listbyparent',[PositionController::class,'listByParent']);
            Route::post('create',[PositionController::class,'store']);
            Route::post('addchild',[PositionController::class,'addChild']);
            Route::put('update',[PositionController::class,'update']);
            Route::get('{id}/read',[PositionController::class,'read']);
            Route::delete('{id}/delete',[PositionController::class,'destroy']);
            Route::put('activate',[PositionController::class,'active']);
            Route::put('deactivate',[PositionController::class,'unactive']);
            Route::post('upload/picture',[PositionController::class,'uploadPicture']);
            Route::post('upload/pdf',[PositionController::class,'uploadPdf']);
            Route::get('pdf',[PositionController::class,'pdf']);
            /**
             * Check the unique user information
             */
            Route::get('children',[PositionController::class,'getChildren']);
            Route::get('regulators',[PositionController::class,'getRegulators']);
            Route::get('staffs',[ PositionController::class , 'staffs']);
            Route::get('{id}/people',[ PositionController::class , 'people']);
            Route::put('setleader',[ PositionController::class , 'setLeader']);
            Route::put('addstaff',[ PositionController::class , 'addPeopleToPosition']);
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

    /** REGULATOR SECTION */
    Route::group([
        'prefix' => 'regulators' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {;
            Route::get('',[RegulatorController::class,'index']);
            Route::get('child',[RegulatorController::class,'child']);
            Route::get('read',[RegulatorController::class,'read']);
            Route::post('create',[RegulatorController::class,'create']);
            Route::put('update',[RegulatorController::class,'update']);
            Route::put('activate',[RegulatorController::class,'active']);
            Route::put('deactivate',[RegulatorController::class,'unactive']);
            Route::put('publish',[RegulatorController::class,'publish']);
            Route::put('unpublish',[RegulatorController::class,'unpublish']);
            Route::delete('{id}/delete',[RegulatorController::class,'delete']);
            Route::post('upload',[RegulatorController::class,'upload']);

            Route::post('upload/picture',[RegulatorController::class,'uploadPicture']);
            Route::post('upload/pdf',[RegulatorController::class,'uploadPdf']);
            Route::get('pdf',[RegulatorController::class,'pdf']);
            

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

    /** REGULATOR TYPE SECTION */
    Route::group([
        'prefix' => 'regulatortypes' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[TypeController::class,'index']);
            Route::get('compact',[TypeController::class,'compact']);
            Route::get('listbyparent',[TypeController::class,'listByParent']);
            Route::post('create',[TypeController::class,'store']);
            Route::post('addchild',[TypeController::class,'addChild']);
            Route::put('update',[TypeController::class,'update']);
            Route::get('{id}/read',[TypeController::class,'read']);
            Route::delete('{id}/delete',[TypeController::class,'destroy']);
            Route::put('activate',[TypeController::class,'active']);
            Route::put('deactivate',[TypeController::class,'unactive']);
            Route::post('upload/picture',[TypeController::class,'uploadPicture']);
            Route::post('upload/pdf',[TypeController::class,'uploadPdf']);
            Route::get('pdf',[TypeController::class,'pdf']);
            /**
             * Check the unique user information
             */
            Route::get('children',[TypeController::class,'getChildren']);
            Route::get('regulators',[TypeController::class,'getRegulators']);
            Route::get('staffs',[ TypeController::class , 'staffs']);
            Route::get('{id}/people',[ TypeController::class , 'people']);
            Route::put('setleader',[ TypeController::class , 'setLeader']);
            Route::put('addstaff',[ TypeController::class , 'addPeopleToPosition']);
    });

    /** REGULATOR SIGNATURE SECTION */
    Route::group([
        'prefix' => 'regulatorsignatures' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[SignatureController::class,'index']);
            Route::get('compact',[SignatureController::class,'compact']);
            Route::get('listbyparent',[SignatureController::class,'listByParent']);
            Route::post('create',[SignatureController::class,'store']);
            Route::post('addchild',[SignatureController::class,'addChild']);
            Route::put('update',[SignatureController::class,'update']);
            Route::get('{id}/read',[SignatureController::class,'read']);
            Route::delete('{id}/delete',[SignatureController::class,'destroy']);
            Route::put('activate',[SignatureController::class,'active']);
            Route::put('deactivate',[SignatureController::class,'unactive']);
            Route::post('upload/picture',[SignatureController::class,'uploadPicture']);
            Route::post('upload/pdf',[SignatureController::class,'uploadPdf']);
            Route::get('pdf',[SignatureController::class,'pdf']);
            /**
             * Check the unique user information
             */
            Route::get('children',[SignatureController::class,'getChildren']);
            Route::get('regulators',[SignatureController::class,'getRegulators']);
            Route::get('staffs',[ SignatureController::class , 'staffs']);
            Route::get('{id}/people',[ SignatureController::class , 'people']);
            Route::put('setleader',[ SignatureController::class , 'setLeader']);
            Route::put('addstaff',[ SignatureController::class , 'addPeopleToPosition']);
    });

    /** REGULATOR SIGNATURE SECTION */
    Route::group([
        'prefix' => 'countesies' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {
            Route::get('',[CountesyController::class,'index']);
            Route::get('compact',[CountesyController::class,'compact']);
            Route::get('listbyparent',[CountesyController::class,'listByParent']);
            Route::post('create',[CountesyController::class,'store']);
            Route::post('addchild',[CountesyController::class,'addChild']);
            Route::put('update',[CountesyController::class,'update']);
            Route::get('{id}/read',[CountesyController::class,'read']);
            Route::delete('{id}/delete',[CountesyController::class,'destroy']);
            Route::put('activate',[CountesyController::class,'active']);
            Route::put('deactivate',[CountesyController::class,'unactive']);
            Route::post('upload/picture',[CountesyController::class,'uploadPicture']);
            Route::post('upload/pdf',[CountesyController::class,'uploadPdf']);
            Route::get('pdf',[CountesyController::class,'pdf']);
            /**
             * Check the unique user information
             */
            Route::get('children',[CountesyController::class,'getChildren']);
            Route::get('regulators',[CountesyController::class,'getRegulators']);
            Route::get('staffs',[ CountesyController::class , 'staffs']);
            Route::get('{id}/people',[ CountesyController::class , 'people']);
            Route::put('setleader',[ CountesyController::class , 'setLeader']);
            Route::put('addstaff',[ CountesyController::class , 'addPeopleToPosition']);
    });

    /** LEGAL DRAFT SECTION */
    Route::group([
        'prefix' => 'legaldrafts' ,
        'namespace' => 'Api' ,
        'middleware' => 'auth:api'
        ], function() {;
            Route::get('',[LegalDraftController::class,'index']);
            Route::get('read',[LegalDraftController::class,'read']);
            Route::post('',[LegalDraftController::class,'create']);
            Route::put('',[LegalDraftController::class,'update']);
            Route::delete('',[LegalDraftController::class,'destroy']);
            // Route::post('upload',[LegalDraftController::class,'upload']);
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

    // Route::group([
    //     'prefix' => 'organizations' ,
    //     ], function() {
    //         Route::get('',[OrganizationController::class,'index']);
    //         Route::get('compact', [OrganizationController::class,'compact']);
    //         Route::get('read',[OrganizationController::class,'read']);
    //         Route::post('',[OrganizationController::class,'create']);
    //         Route::put('',[OrganizationController::class,'update']);
    //         Route::put('{id}/activate',[OrganizationController::class,'activate']);
    //         Route::put('{id}/deactivate',[OrganizationController::class,'deactivate']);
    //         Route::delete('',[OrganizationController::class,'destroy']);

    //         Route::get('child',[OrganizationController::class,'child']);
    //         Route::post('upload',[OrganizationController::class,'upload']);
            
    // });

    // Route::group([
    //     'prefix' => 'positions' ,
    //     ], function() {
    //         Route::get('',[PositionController::class,'index']);
    //         Route::get('compact', [PositionController::class,'compact']);
    //         Route::get('read',[PositionController::class,'read']);
    //         Route::post('',[PositionController::class,'create']);
    //         Route::put('',[PositionController::class,'update']);
    //         Route::put('{id}/activate',[PositionController::class,'activate']);
    //         Route::put('{id}/deactivate',[PositionController::class,'deactivate']);
    //         Route::delete('',[PositionController::class,'destroy']);

    //         Route::get('child',[PositionController::class,'child']);
    //         Route::post('upload',[PositionController::class,'upload']);
            
    // });

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

    require( 'admin/attendant.php' );
    require( 'admin/book.php' );
    require( 'admin/task.php' );
    require( 'admin/timeslot.php' );

});
