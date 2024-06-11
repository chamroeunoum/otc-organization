<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\RegulatorController;
use App\Http\Controllers\Api\Admin\YPReaderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "";
    // return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    // Facebook
    Route::group(
        [ 
        'prefix' => 'google',
        'middleware' => 'api'
        ]
        ,function(){
            Route::post('redirect', function(Request $request){
                return Socialite::driver('google')->redirect();
            });
            Route::post('callback', function(Request $request){
                $googleUser = Socialite::driver('google')->user();
                $user = User::updateOrCreate([
                'github_id' => $googleUser->id,
                ], [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
            
                Auth::login($user);
            
                return redirect('/dashboard');
            });
        }
    );
});

