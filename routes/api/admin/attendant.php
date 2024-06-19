<?php 
use App\Http\Controllers\Api\Admin\Attendant\AttendantController;
/** Attendant SECTION */
Route::group([
  'prefix' => 'attendants' ,
  'namespaces' => '\App\Http\Controllers\Api\Admin\Attendant' ,
  'middleware' => 'auth:api'
  ], function() {
    /**
     * Crud
     */
    Route::get('',[AttendantController::class,'index']);
    Route::put('update',[AttendantController::class,'update']);
    Route::get('{id}/read',[AttendantController::class,'read']);
    Route::delete('{id}/delete',[AttendantController::class,'destroy']);
    /**
     * Check in & Check out within the system
     */
    Route::post('checkin/system',[AttendantController::class,'systemCheckin']);
    Route::post('checkout/system',[AttendantController::class,'systemCheckout']);
    /**
     * Check in & Check out with face reconigtion device
     */
    Route::post('checkin/face',[AttendantController::class,'faceCheckin']);
    Route::post('checkin/face',[AttendantController::class,'faceCheckin']);
    /**
     * Check in & Check out within the finger print device
     */
    Route::post('checkout/finger',[AttendantController::class,'fingerCheckout']);
    Route::post('checkout/finger',[AttendantController::class,'finterCheckout']);
    /**
     * Check in & Check out within the staff ID
     */
    Route::post('checkin/staffid',[AttendantController::class,'staffCheckin']);
    Route::post('checkout/staffid',[AttendantController::class,'staffCheckout']);
    /**
     * Get the attendants of user
     */
    Route::get('{date}/month/{userId}/user',[AttendantController::class,'userAttendants']);
  });

  Route::group([
    'prefix' => 'attendants' ,
    'namespaces' => '\App\Http\Controllers\Api\Admin\Attendant' ,
    'middleware' => 'api'
    ], function() {
    Route::post('checkattendantbyemailorphone',[AttendantController::class,'checkAttendantByEmailOrPhoneByOrganization']);
    Route::get('getattendantbyemailorphone/{term}/{type}',[AttendantController::class,'getAttendantByEmailOrPhone']);
  });