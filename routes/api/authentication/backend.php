<?php
    use Illuminate\Http\Request;
    use App\Http\Controllers\Api\Admin\AuthController;
    use App\Http\Controllers\Api\Admin\UserController;
    use App\Http\Controllers\Api\Admin\PeopleController;

    Route::group([
        'prefix' => 'admin'
    ],function(){

        /** SIGNING SECTION */
        Route::group([
            'prefix' => 'auth'
        ], function () {
            Route::post('login', [AuthController::class,'login']);
        });

        Route::group([
            'prefix' => 'auth' ,
            'middleware' => 'auth:api'
        ], function() {
            Route::post('logout', [AuthController::class,'logout']);
            Route::get('user', [AuthController::class,'user']);
        });

        Route::group([
            'prefix' => 'auth'
        ], function() {
            Route::post('signup', [AuthController::class,'signup']);
            Route::put('signup/activate', [AuthController::class,'signupActivate']);
            /** RESET PASSWORD */
            Route::put('password/forgot',[UserController::class,'forgotPassword']);
            Route::put('password/forgot/confirm',[UserController::class,'checkConfirmationCode']);
            Route::put('password/reset',[UserController::class,'passwordReset']);
        });

        /** USER/ACCOUNT SECTION */
        // Route::group([
        //     'prefix' => 'users' ,
        //     'namespace' => 'Api' ,
        //     'middleware' => 'auth:api'
        //     ], function() {
        //         Route::get('',[UserController::class,'index']);
        //         Route::post('create',[UserController::class,'store']);
        //         Route::put('update',[UserController::class,'update']);
        //         Route::put('authenticated',[ProfileController::class,'updateAuthUser']);
        //         Route::get('{id}/read',[UserController::class,'read']);
        //         Route::delete('{id}/delete',[UserController::class,'destroy']);
        //         Route::put('activate',[UserController::class,'active']);
        //         Route::put('password/change',[UserController::class,'passwordChange']);
        //         /**
        //          * Check the unique user information
        //          */
        //         Route::get('username/exist',[UserController::class,'checkUsername']);
        //         Route::get('phone/exist',[UserController::class,'checkPhone']);
        //         Route::get('email/exist',[UserController::class,'checkEmail']);
        //         Route::post('upload',[UserController::class,'upload']);
        // });

        /** PEOPLE / USER INFORMATION SECTION */
        // Route::group([
        //     'prefix' => 'people' ,
        //     'namespace' => 'Api' ,
        //     'middleware' => 'auth:api'
        //     ], function() {
        //         Route::get('',[PeopleController::class,'index']);
        //         Route::post('create',[PeopleController::class,'store']);
        //         Route::put('update',[PeopleController::class,'update']);
        //         Route::get('{id}/read',[PeopleController::class,'read']);
        //         Route::delete('{id}/delete',[PeopleController::class,'destroy']);
        // });

    });