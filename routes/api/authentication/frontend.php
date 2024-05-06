<?php
    use Illuminate\Http\Request;
    use App\Http\Controllers\Api\Authentication\AuthController;
    use App\Http\Controllers\Api\Authentication\UserController;
    use App\Http\Controllers\Api\Authentication\ProfileController;


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

        Route::group([
            'prefix' => 'profile'
        ], function() {
            Route::get('information',[ProfileController::class,'information']);
            Route::post('password/change',[ProfileController::class,'passwordChange']);
        });

    });

    Route::group([
        'prefix' => 'auth'
    ], function() {
        Route::post('signup', [AuthController::class,'signup']);
        Route::post('signup/activate', [AuthController::class,'signupActivate']);
        /** RESET PASSWORD BY EMAIL WITHOUT AUTHENTICATION */
        Route::post('password/request/reset/bymail',[AuthController::class,'resetPasswordByEmail']);
        Route::post('password/request/reset/bymail/update',[AuthController::class,'checkConfirmationCodeFromEmail']);
        /** RESET PASSWORD BY GOOGLE AUTHENTICATOR WITHOUT AUTHENTICATION */
        Route::post('google/authenticator/pair',[AuthController::class,'googleAuthenticatorPair']);
        Route::post('google/authenticator/validate',[AuthController::class,'googleAuthenticatorValidate']);
        
        // Route::post('password/request/reset/bygoogleauthenticator',[AuthController::class,'googleAuthenticatorPair']);
        // Route::post('password/request/reset/bygoogleauthenticator/update',[AuthController::class,'checkConfirmationCodeFromEmail']);
    });
