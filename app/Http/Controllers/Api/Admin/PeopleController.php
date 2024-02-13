<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\MobilePasswordResetRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\People\People as RecordModel ;
use App\Http\Controllers\CrudController;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class PeopleController extends Controller
{
    private $selectFields = [
        'id',
        'firstname' ,
        'lastname' ,
        'gender' ,
        'dob' ,
        'mobile_phone' ,
        'office_phone' ,
        'email',
        'nid' ,
        'image' ,
        'marry_status' ,
        'father' ,
        'mother'
    ];
    /**
     * Listing function
     */
    public function index(Request $request){
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 10 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;

        $queryString = [
            // "where" => [
            //     'default' => [
            //         [
            //             'field' => 'type_id' ,
            //             'value' => $type === false ? "" : $type
            //         ]
            //     ],
            //     'in' => [] ,
            //     'not' => [] ,
            //     'like' => [
            //         [
            //             'field' => 'number' ,
            //             'value' => $number === false ? "" : $number
            //         ],
            //         [
            //             'field' => 'year' ,
            //             'value' => $date === false ? "" : $date
            //         ]
            //     ] ,
            // ] ,
            // "pivots" => [
            //     $unit ?
            //     [
            //         "relationship" => 'units',
            //         "where" => [
            //             "in" => [
            //                 "field" => "id",
            //                 "value" => [$request->unit]
            //             ],
            //         // "not"=> [
            //         //     [
            //         //         "field" => 'fieldName' ,
            //         //         "value"=> 'value'
            //         //     ]
            //         // ],
            //         // "like"=>  [
            //         //     [
            //         //        "field"=> 'fieldName' ,
            //         //        "value"=> 'value'
            //         //     ]
            //         // ]
            //         ]
            //     ]
            //     : []
            // ],
            "pagination" => [
                'perPage' => $perPage,
                'page' => $page
            ],
            "search" => $search === false ? [] : [
                'value' => $search ,
                'fields' => [
                    'firstname' ,
                    'lastname' ,
                    'dob' ,
                    'mobile_phone' ,
                    'office_phone' ,
                    'email',
                    'nid'
                ]
            ],
            "order" => [
                'field' => 'id' ,
                'by' => 'desc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectFields);
        $crud->setRelationshipFunctions([
        //     /** relationship name => [ array of fields name to be selected ] */
        //     "person" => ['id','firstname' , 'lastname' , 'gender' , 'dob' , 'pob' , 'picture' ] ,
        //     "roles" => ['id','name', 'tag'] ,
            "countesies" => [ 'id', 'name' , 'desp' , 'pid' , 'record_index' ] ,
            "organizations" => [ 'id', 'name' , 'desp' , 'pid' , 'record_index' ] ,
            "positions" => [ 'id', 'name' , 'desp' , 'pid' , 'record_index' ] ,
            'user' => [ 'id' , 'username' , 'phone' , 'email' ]
        ]);

        $builder = $crud->getListBuilder()->whereNull('deleted_at');

        $responseData = $crud->pagination(true, $builder);
        // $responseData['records'] = $responseData['records']->map(function($user){
        //     $people = $user['person']['id'] > 0 ? \App\Models\People\People::find( $user['person']['id'] ) : null ;
        //     if( $people != null ){
        //         $user['person']['organizations'] = $people->organizations;
        //         $user['person']['positions'] = $people->positions;
        //     }
        //     return $user;
        // });
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData, 200);
    }
    /**
     * Create an account
     */
    public function store(Request $request){
        $user = \App\Models\User::where('email',$request->email)->first() ;
        if( $user ){
            // អ្នកប្រើប្រាស់បានចុះឈ្មោះរួចរាល់ហើយ
            return response([
                'user' => $user ,
                'message' => 'គណនី '.$user->name.' មានក្នុងប្រព័ន្ធរួចហើយ ។' . (
                    $user->active ? " ហើយកំពុងបើកដំណើរការជាធម្មតា !" : " កំពុងត្រូវបានបិទដំណើរការ !"
                )],201
            );
        }else{
            // អ្នកប្រើប្រាស់ មិនទាន់មាននៅឡើយទេ
            $user = new \App\Models\User([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'active' => $request->active == true || $request->active == 1 ? 1 : 0 ,
                'password' => bcrypt($request->password) ,
                'phone' => $request->phone ,
                'username' => $request->username
            ]);

            /**
             * Create detail information of the owner of the account
             */
            $person = \App\Models\People\People::create([
                'firstname' => $user->firstname , 
                'lastname' => $user->lastname , 
                'gender' => $user->gender , 
                'dob' => $user->dob , 
                'mobile_phone' => $user->mobile_phone , 
                'email' => $user->email , 
                'image' => $user->avatar_url , 
            ]);
            $user->people_id = $person->id ;
            $user->save();

            /**
             * Assign role
             */
            $backendMemberRole = \App\Models\Role::where('name','Backend member')->first();
            if( $backendMemberRole != null ){
                $user->assignRole( $backendMemberRole );
            }
            
            $user->save();

            if( isset( $request->organizations ) && !empty( $request->organizations ) ){
                $user->person->organizations()->sync( $request->organizations );
            }
            if( isset( $request->positions ) && !empty( $request->positions ) ){
                $user->person->positions()->sync( $request->positions );
            }

            if( $user ){
                
                return response()->json([
                    'user' => \App\Models\User::find( $user->id ) ,
                    'message' => 'គណនីបង្កើតបានជោគជ័យ !'
                ], 200);

            }else {
                return response()->json([
                    'user' => null ,
                    'message' => 'បរាជ័យក្នុងការបង្កើតគណនី !'
                ], 201);
            }
        }
    }
    /**
     * Create an account
     */
    public function update(Request $request){
        $person = isset( $request->id ) && $request->id > 0 ? RecordModel::find($request->id) : (
            isset( $request->email ) && $request->email != "" ? RecordModel::where('email',$request->email)->first() : null
        );
        if( $person && $person->update([
            'firstname' => $request->firstname ,
            'lastname' => $request->lastname ,
            'gender' => intval($request->gender) >= 0 ? $request->gender :  1 ,
            'email' => $request->email ,
            'dob' => $request->dob ,
            'mobile_phone' => $request->mobile_phone ,
            'office_phone' => $request->office_phone ,
            'marry_status' => $request->marry_status != null && $request->marry_status != '' ? $request->marry_status : 'single'
        ]) == true ){;
            if( isset( $request->organizations ) && is_array( $request->organizations ) ){
                $person->organizations()->sync( $request->organizations );
            }
            if( isset( $request->positions ) && is_array( $request->positions ) ){
                $person->positions()->sync( $request->positions );
            }
            if( isset( $request->countesies ) && is_array( $request->countesies ) ){
                $person->countesies()->sync( $request->countesies );
            }
            return response()->json([
                'record' => $person ,
                'message' => 'កែប្រែព័ត៌មានរួចរាល់ !' ,
                'ok' => true
            ], 200);
        }else{
            // អ្នកប្រើប្រាស់មិនមាន
            return response([
                'record' => null ,
                'message' => 'គណនីដែលអ្នកចង់កែប្រែព័ត៌មាន មិនមានឡើយ។' ,
                'ok' => false
            ], 403);
        }
    }
    /**
     * Active function of the account
     */
    public function active(Request $request){
        $user = RecordModel::find($request->id) ;
        if( $user ){
            $user->active = $request->active ;
            $user->save();
            // User does exists
            return response([
                'user' => $user ,
                'ok' => true ,
                'message' => 'គណនី '.$user->name.' បានបើកដោយជោគជ័យ !' 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'user' => null ,
                'ok' => false ,
                'message' => 'សូមទោស គណនីនេះមិនមានទេ !' 
                ],
                201
            );
        }
    }
    /**
     * Function delete an account
     */
    public function destroy(Request $request){
        $user = RecordModel::find($request->id) ;
        if( $user ){
            $user->active = 0 ;
            $user->deleted_at = \Carbon\Carbon::now() ;
            $user->save();
            // User does exists
            return response([
                'ok' => true ,
                'user' => $user ,
                'message' => 'គណនី '.$user->name.' បានលុបដោយជោគជ័យ !' ,
                'ok' => true 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'user' => null ,
                'message' => 'សូមទោស គណនីនេះមិនមានទេ !' ],
                201
            );
        }
    }
    public function read(Request $request){
        if( !isset( $request->id ) || $request->id < 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់គណនី។'
            ],422);
        }
        $record = RecordModel::find($request->id);
        if( $record == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'ស្វែងរកគណនីមិនឃើញឡើយ។'
            ],403);
        }

        if( $record->image != null && $record->image != "" && Storage::disk('public')->exists( $record->image )  ){
            $record->image = Storage::disk("public")->url( $record->image  );
        }else{
            $record->image = null ;
        }

        $record->countesies;
        $record->positions;
        $record->organizations;

        return response()->json([
            'record' => $record ,
            'ok' => true ,
            'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់ឯកសារ។'
        ],200);
    }
    // public function upload(Request $request){
    //     $user = \Auth::user();
    //     if( $user ){
    //         if( isset( $_FILES['files']['tmp_name'] ) && $_FILES['files']['tmp_name'] != "" ) {
    //             if( ( $user = RecordModel::find($request->id) ) !== null ){
    //                 $uniqeName = Storage::disk('public')->putFile( 'avatars/'.$user->id , new File( $_FILES['files']['tmp_name'] ) );
    //                 $user->avatar_url = $uniqeName ;
    //                 $user->save();
    //                 if( Storage::disk('public')->exists( $user->avatar_url ) ){
    //                     $user->avatar_url = Storage::disk('public')->url( $user->avatar_url  );
    //                     return response([
    //                         'record' => $user ,
    //                         'message' => 'ជោគជ័យក្នុងការបញ្ចូលរូបថត។'
    //                     ],200);
    //                 }else{
    //                     return response([
    //                         'record' => $user ,
    //                         'message' => 'គណនីនេះមិនមានរូបថតឡើយ។'
    //                     ],403);
    //                 }
    //             }else{
    //                 return response([
    //                     'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់របស់គណនី។'
    //                 ],403);
    //             }
    //         }else{
    //             return response([
    //                 'result' => $_FILES ,
    //                 'message' => 'មានបញ្ហាជាមួយរូបភាពដែលអ្នកបញ្ជូនមក។'
    //             ],403);
    //         }
            
    //     }else{
    //         return response([
    //             'message' => 'សូមចូលប្រព័ន្ធជាមុនសិន។'
    //         ],403);
    //     }
    // }
}
