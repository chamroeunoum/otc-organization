<?php 
use App\Http\Controllers\Api\Admin\Attendant\TimeslotController;
/** Task SECTION */
Route::group([
  'prefix' => 'timeslots' ,
  'middleware' => 'auth:api'
  ], function() {
    /**
     * Methods to apply for each of the CRUD operations
     * Create => POST
     * Read => GET
     * Update => PUT
     * Delete => DELETE
     */
    Route::get('',[TimeslotController::class,'index']);
    Route::post('create',[TimeslotController::class,'store']);
    Route::put('update',[TimeslotController::class,'update']);
    Route::get('{id}/read',[TimeslotController::class,'read']);
    Route::delete('{id}/delete',[TimeslotController::class,'destroy']);
    Route::put('activate',[TimeslotController::class,'active']);
    Route::put('deactivate',[TimeslotController::class,'unactive']);
    
  });