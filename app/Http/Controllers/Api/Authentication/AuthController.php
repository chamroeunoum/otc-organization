<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\Frontend\Auth\SignupActivate;
use App\Notifications\Frontend\Auth\PasswordResetRequest;
use Illuminate\Support\Str;
use Avatar;
use Illuminate\Http\File;
use Storage;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'name' => $request->lastname . ' ' . $request->firstname ,
            'phone' => $request->phone ,
            'username' => $request->email,
            'email' => $request->email,
            'active' => 1 , // Unactive user
            'password' => bcrypt($request->password),
            'activation_token' => strtoupper( Str::random(6) )
        ]);
        $user->save();

        // $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        // $uniqeName = Storage::putFile( 'avatars/'.$user->id , new File( (string) $avatar ) );
        // $user->avatar_url = $uniqeName ;
        // $user->save();

        /**
         * Create detail information of the owner of the account
         */
        $person = \App\Models\People\People::create([
            'firstname' => $user->firstname , 
            'lastname' => $user->lastname , 
            'gender' => $user->gender , 
            'dob' => $user->dob , 
            'mobile_phone' => $user->phone , 
            'email' => $user->email , 
            'image' => $user->avatar_url , 
        ]);
        $user->people_id = $person->id ;
        $user->save();

        /**
         * Assign role to user
         */
        $clientClientRole = \App\Models\Role::client()->first();
        if( $clientClientRole != null ){
            $user->assignRole( $clientClientRole );
        }
        $sendingMailResult = null ;
        $sendingMailResult = $user->notify(new SignupActivate($user) );
        return response()->json([
            'ok' => true ,
            'record' => $user ,
            'mailing' => $sendingMailResult ,
            'message' => 'គណនីបានបង្កើតរួចរាល់។'
        ], 200);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials)){
            if( \App\Models\User::where('email', $request->email)->first() != null ){
                /**
                 * Account does exist but the password might miss type
                 */
                return response()->json([
                    'message' => 'សូមពិនិត្យពាក្យសម្ងាត់របស់អ្នក !'
                ], 401);
            }else{
                /**
                 * Account does exist but the password might miss type
                 */
                return response()->json([
                    'message' => 'អ៊ីមែលរបស់អ្នកមិនមានក្នុងប្រព័ន្ធឡើយ !'
                ], 401);
            }
        }
            
        /**
         * Retrieve account
         */
        $user = $request->user();

        /**
         * Update some information to keep track the user authentiation
         */
        $user->update(
            [
                'login_count' => intval( $user->login_count ) + 1 ,
                'last_login' => \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                'ip' => // if user from the share internet   
                !empty($_SERVER['HTTP_CLIENT_IP'])
                    ? $_SERVER['HTTP_CLIENT_IP']
                    : ( 
                        //if user is from the proxy   
                        !empty($_SERVER['HTTP_X_FORWARDED_FOR'])
                            ? $_SERVER['HTTP_X_FORWARDED_FOR']
                            //if user is from the remote address
                            : $_SERVER['REMOTE_ADDR']
                    )
            ]
        );
        
        /**
         * Check disability
         */
        if( $user->active <= 0 ) {
            /**
            * Account has been disabled
            */
           return response()->json([
               'message' => 'គណនីនេះត្រូវបានបិទជាបណ្ដោះអាសន្ន។'
           ], 403);
        }
        /**
         * Check roles
         * Allow backend and client member to be logged in
         */
        if( empty( array_intersect( $user->roles->pluck('id')->toArray() , \App\Models\Role::client()->pluck('id')->toArray() ) ) ){
            /**
             * User seem does not have any right to login into backend / core service
             */
            return response()->json([
                'message' => "គណនីនេះមិនមានសិទ្ធិគ្រប់គ្រាន់។"
            ],403);
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        $record = \App\Models\User::select('id','lastname','firstname','phone','username','email','login_count','avatar_url','last_login','last_logout','id','authenip','mac_address')->where('id',$user->id)->first();
        if( $record ){
            if( $record->avatar_url !== null && Storage::disk('public')->exists( $user->avatar_url ) ){
                $record->avatar_url = Storage::disk("public")->url( $user->avatar_url  );
            }else{
                $record->avatar_url = null ;
            }
        }
        $record['roles'] = $user->roles->select('id','name','guard_name','tag');
        return response()->json([
            'ok' => true ,
            'upload_max_filesize' => ini_get("upload_max_filesize") ,
            'token' => [
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ],
            'record' => $record ,
            'message' => 'ចូលប្រើប្រាស់បានជោគជ័យ !'
        ],200);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        /**
         * Update some information to keep track the user authentiation
         */
        $request->user()->update(
            [
                'last_logout' => \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                'ip' => // if user from the share internet   
                !empty($_SERVER['HTTP_CLIENT_IP'])
                    ? $_SERVER['HTTP_CLIENT_IP']
                    : ( 
                        //if user is from the proxy   
                        !empty($_SERVER['HTTP_X_FORWARDED_FOR'])
                            ? $_SERVER['HTTP_X_FORWARDED_FOR']
                            //if user is from the remote address
                            : $_SERVER['REMOTE_ADDR']
                    )
            ]
        );
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'អ្នកបានចាកចេញដោយជោគជ័យ !'
        ]);
    }

    public function signupActivate(Request $request)
    {
        $user = User::where('activation_token', $request->token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'កូតនេះមិនត្រឹមត្រូវឡើយ !'
            ], 403);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return response()->json(
            [
                'message' => 'អ្នកបានចុះឈ្មោះដោយជោគជ័យ! សូមចូលប្រើប្រាស់។' ,
                'ok' => true ,
                'record' => $user
            ],200);
    }

    /**
     * Send an email to confirmation code
     */
    public function resetPasswordByEmail(Request $request){
        if( isset( $request->email ) && strlen( $request->email ) ){
            $record = \App\Models\User::where('email',$request->email )->first();
            if ($record) {
                $record -> forgot_password_token = strtoupper( Str::random(6) ) ;
                $record -> update();
                // Send mail with verification code
                $record->notify( new PasswordResetRequest() );
                return response()->json([
                    'ok' => true ,
                    'message' => 'យើងបានបញ្ជូនព័ត៌មាន សម្រាប់អ្នកធ្វើការកំណត់ពាក្យសម្ងាត់ឡើងវិញ ទៅ អ៊ីមែលរបស់អ្នក រួចរាល់ ! សូមពិនិត្យអ៊ីមែលរបស់អ្នកសម្រាប់ការងារបន្ត !'
                ], 200);
            }else{
                return response()->json([
                    'ok' => false ,
                    'message' => 'អ៊ីមែលនេះមិនទាន់ក្នុងប្រព័ន្ធឡើយ !'
                ], 201);
            }
        }
        return response()->json([
            'ok' => false ,
            'message' => 'សូមបញ្ជាក់អំពី អ៊ីមែលរបស់អ្នក !'
        ], 422);
    }
    public function checkConfirmationCodeFromEmail(Request $request){
        if( $request->email != "" && $request->code != "" ){
            $record = \App\Models\User::where( 'email',$request->email )->where('forgot_password_token', $request->code )->first();
            if ($record) {
                $record -> forgot_password_token = '' ;
                $record -> password = Hash::make($request->password);
                $record -> update();
                return response()->json([
                    'ok' => true ,
                    'message' => 'ការបញ្ជាក់ កូដសម្ងាត់បានជោគជ័យ។ ពាក្យសម្ងាត់ថ្មី របស់អ្នក បានប្ដូរដោយជោគជ័យ។'
                ], 200);
            }else{
                return response()->json([
                    'ok' => false ,
                    'message' => 'បរាជ័យក្នុងការបញ្ជាក់ពាក្យសម្ងាត់ !'
                ], 403);
            }
        }
        return response()->json([
            'ok' => false ,
            'message' => 'សូមបញ្ជាក់អំពី អ៊ីមែល ឬ លេខកូដសម្រាប់ផ្លាស់ប្ដូរសម្ងាត់ របស់អ្នក !'
        ], 422);
    }
    public function googleAuthenticatorPair(Request $request){
        $appName = "OTCVerification" ;
        $appInfo = "OneTechCambodiaVerification" ;
        $secretCode = "otcverification" ;
        libxml_use_internal_errors(true);
        $url = "http://www.authenticatorapi.com/api.asmx/Pair?appName=".$appName."&appInfo=".$appInfo."&secretCode=".$secretCode;
        libxml_use_internal_errors(true);
        $data = null;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //curl_setopt($ch, CURLOPT_HTTP_VERSION, '1.1');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        $data = curl_exec($ch);
        curl_close($ch);
        if( empty($data) ) return false ;
        $xmlObject = simplexml_load_string($data);  
        $json = json_encode($xmlObject);
        $array = json_decode($json, true); 
        return response()->json([
            'ok' => true ,
            'code' => $array['ManualSetupCode'] ,
            'html' => $array['Html']
        ],200);
    }
    public function googleAuthenticatorValidate(Request $request){
        $appName = "OTCVerification" ;
        $appInfo = "OneTechCambodiaVerification" ;
        $secretCode = "otcverification" ;
        libxml_use_internal_errors(true);
        $url = "http://www.authenticatorapi.com/api.asmx/ValidatePin?pin=".$request->pin."&secretCode=".$secretCode;
        libxml_use_internal_errors(true);
        $data = null;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        $data = curl_exec($ch);
        curl_close($ch);
        if( empty($data) ) return false ;
        $xmlObject = simplexml_load_string($data);  
        $json = json_encode($xmlObject);
        $array = json_decode($json, true); 
        return response()->json([
            'ok' => $array[0]
        ],200);
    }
    
}