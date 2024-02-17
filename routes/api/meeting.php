<?php 
use App\Http\Controllers\Api\Meeting\MeetingController;
use App\Http\Controllers\Api\Meeting\AuthController;
use App\Http\Controllers\Api\Meeting\UserController;
use App\Http\Controllers\Api\Meeting\ProfileController;
use App\Http\Controllers\Api\Meeting\Organization\OrganizationController;
use App\Http\Controllers\Api\Meeting\Position\PositionController;
use App\Http\Controllers\Api\Meeting\Type\TypeController;
use App\Http\Controllers\Api\Meeting\Countesy\CountesyController;
use App\Http\Controllers\Api\Meeting\Room\RoomController;
use App\Http\Controllers\Api\Meeting\Room\MeetingRoomController;
use App\Http\Controllers\Api\Meeting\Regulator\RegulatorController;
use App\Http\Controllers\Api\Meeting\Member\MemberController;
/** MEETING SECTION */
Route::group([
  'prefix' => 'meeting' ,
  'namespaces' => '\App\Http\Controllers\Api\Meeting' ,
  'middleware' => 'api'
  ], function() {

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

    /** USER/ACCOUNT SECTION */
    Route::group([
      'prefix' => 'users' ,
      'middleware' => 'auth:api'
      ], function() {
        /**
         * Api for cin
         */
        Route::get('',[UserController::class,'index']);
        Route::post('',[UserController::class,'index']);
        Route::put('',[UserController::class,'update']);
        Route::get('{id}',[UserController::class,'read']);
        Route::delete('',[UserController::class,'destroy']);
        Route::put('activate',[UserController::class,'active']);
        // Route::put('password/change',[UserController::class,'logout']);
        Route::post('upload',[UserController::class,'upload']);
    });

    Route::group([
      'prefix' => 'users/authenticated' ,
      'middleware' => 'auth:api'
      ], function() {
        /**
         * Api for profile
         */
            Route::get('',[ProfileController::class,'getAuthUser']);
            Route::put('',[ProfileController::class,'updateAuthUser']);
            Route::put('password',[ProfileController::class,'updateAuthUserPassword']);
            Route::post('picture/upload',[ProfileController::class,'upload']);
    });

    /**
     * Methods to apply for each of the CRUD operations
     * Create => POST
     * Read => GET
     * Update => PUT
     * Delete => DELETE
     */
    /**
     * Crud
     */
    Route::group([
      'prefix' => 'meetings' ,
      'middleware' => 'auth:api'
      ], function() {
      Route::get('',[MeetingController::class,'index']);
      Route::post('',[MeetingController::class,'create']);
      Route::put('update',[MeetingController::class,'update']);
      Route::get('{id}/read',[MeetingController::class,'read']);
      Route::delete('{id}/delete',[MeetingController::class,'destroy']);
      Route::put('start',[MeetingController::class,'start']);
      Route::put('end',[MeetingController::class,'end']);
      /**
       * Status
       */
      Route::put('{id}/status/new',[MeetingController::class,'statusNew']);
      Route::put('{id}/status/meeting',[MeetingController::class,'statusMeeting']);
      Route::put('{id}/status/continue',[MeetingController::class,'statusContinue']);
      Route::put('{id}/status/change',[MeetingController::class,'statusChange']);
      Route::put('{id}/status/delay',[MeetingController::class,'statusDelay']);
      Route::put('{id}/status/finished',[MeetingController::class,'statusFinished']);
      /**
       * Reference files
       */
      Route::post('upload/preengs',[MeetingController::class,'uploadSeichdeyPreengs']);
      Route::get('{id}/read/preeng/{serial}',[MeetingController::class,'readPdfPreeng']);
      Route::get('{id}/remove/preeng/{serial}',[MeetingController::class,'removePdfPreeng']);
      
      Route::post('upload/reports',[MeetingController::class,'uploadReports']);
      Route::get('{id}/read/report/{serial}',[MeetingController::class,'readPdfReport']);
      Route::get('{id}/remove/report/{serial}',[MeetingController::class,'removePdfReport']);

      Route::post('upload/otherdocuments',[MeetingController::class,'uploadOtherDocuments']);
      Route::get('{id}/read/otherdocument/{serial}',[MeetingController::class,'readPdfOtherDocument']);
      Route::get('{id}/remove/otherdocument/{serial}',[MeetingController::class,'removePdfOtherDocument']);

      /**
       * Organization
       */
      Route::put('{id}/organization/{oid}/toggle',[MeetingController::class,'toggleOrganization']);
      /**
       * Regulator
       */
      Route::put('{id}/regulator/{rid}/toggle',[MeetingController::class,'toggleRegulator']);
      /**
       * Member
       */
      Route::put('{id}/member/{mid}/toggle',[MeetingController::class,'toggleMember']);
      Route::post('update_group_role',[MeetingController::class,'updateMemberGroupAndRole']);
      /**
       * Room
       */
      Route::put('{id}/room/{rid}/toggle',[MeetingController::class,'toggleRoom']);
      /**
       * Check attendant
       */
      Route::put('meeting_member/{meeting_member_id}/member/{member_id}/toggle',[MeetingController::class,'checkAttendantToggle']);
      
    });

    Route::group([
      'prefix' => 'tv' ,
      'middleware' => 'api'
      ], function() {
        Route::group([
          'prefix' => 'meetings' ,
          'middleware' => 'api'
          ], function() {
          Route::get('',[MeetingController::class,'tvMeetings']);
        });
    });

    /** ORGANIZATION SECTION */
    Route::group([
      'prefix' => 'organizations' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[OrganizationController::class,'index']);
    });
    /** PEOPLE SECTION */
    Route::group([
      'prefix' => 'people' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[MemberController::class,'index']);
          Route::post('save',[MemberController::class,'save']);
    });
    /** REGULATOR SECTION */
    Route::group([
      'prefix' => 'regulators' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[RegulatorController::class,'index']);
          Route::get('pdf',[RegulatorController::class,'pdf']);
    });
    /** TYPE SECTION */
    Route::group([
      'prefix' => 'types' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[TypeController::class,'index']);
    });
    /** POSITIONS SECTION */
    Route::group([
      'prefix' => 'positions' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[PositionController::class,'index']);
    });
    /** COUNTESY SECTION */
    Route::group([
      'prefix' => 'countesies' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[CountesyController::class,'index']);
    });
    /** ROOM SECTION */
    Route::group([
      'prefix' => 'rooms' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[RoomController::class,'index']);
    });
    /** MEETING ROOM SECTION */
    Route::group([
      'prefix' => 'meetingrooms' ,
      'namespace' => 'Api' ,
      'middleware' => 'auth:api'
      ], function() {
          Route::get('',[MeetingRoomController::class,'index']);
    });

    require('meeting/dashboard.php');
    require('meeting/task.php');
    require('meeting/attendant.php');

  }
);