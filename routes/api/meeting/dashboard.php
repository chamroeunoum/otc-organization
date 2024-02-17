<?php 

/** Task SECTION */
Route::group([
  'prefix' => 'dashboard' ,
  'middleware' => 'api'
  ], function() {
    
    /**
     * Get total account
     */
    Route::get('users/total',function(Request $request){
        return response()->json([
            'ok' => true ,
            'result' => [
                'total' => \App\Models\Meeting\User::count()
            ]
        ],200);
    })->name("DashboardTotalAccounts");

    /**
     * Get total meeting
     */
    Route::get('meetings/total',function(Request $request){
        return response()->json([
            'ok' => true ,
            'result' => [
                'total' => \App\Models\Meeting\Meeting::count()
            ]
        ],200);
    })->name("DashboardTotalMeetings");
    /**
     * Get total meeting by status
     */
    Route::get('meetings/total/bystatus',function(Request $request){
        return response()->json([
            'ok' => true ,
            'result' => \App\Models\Meeting\Meeting::getMeetingsByStatus()
        ],200);
    })->name("DashboardTotalMeetingsByStatus");
    /**
     * Get total meeting by type
     */
    Route::get('meetings/total/bytype',function(Request $request){
        return response()->json([
            'ok' => true ,
            'result' => \App\Models\Meeting\Meeting::getMeetingsByType()
        ],200);
    })->name("DashboardTotalMeetingsByType");
  });