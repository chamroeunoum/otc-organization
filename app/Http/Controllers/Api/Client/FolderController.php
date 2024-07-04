<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use App\Models\Regulator\Regulator;
use App\Models\Folder\Folder as RecordModel;
use Illuminate\Support\Facades\Auth;


class FolderController extends Controller
{
    /**
     * Listing function
     */
    private $selectFields = [
        'id',
        'name' ,
        'user_id' ,
        'created_at' ,
        'updated_at' ,
        'accessibility'
    ];
    /**
     * Listing function
     */
    public function index(Request $request){
        $user = Auth::user() != null ? \Auth::user() : false ;

        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 10 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;

        $queryString = [
            "where" => [
                'default' => [
                    [
                        'field' => 'user_id' ,
                        'value' => $user != null ? $user->id : false
                    ]
                ],
                // 'in' => [
                //     [
                //         'field' => 'document_type' ,
                //         'value' => isset( $request->document_type ) && $request->document_type !== null ? [$request->document_type] : false
                //     ]
                // ] ,
                // 'not' => [
                //     // [
                //     //     'field' => 'field_name' ,
                //     //     'value' => [4]
                //     // ]
                // ] ,
                // 'like' => [
                //     [
                //         'field' => 'number' ,
                //         'value' => $number === false ? "" : $number
                //     ],
                //     [
                //         'field' => 'year' ,
                //         'value' => $date === false ? "" : $date
                //     ]
                // ] ,
            ] ,
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
                    'name'
                ]
            ],
            "order" => [
                'field' => 'name' ,
                'by' => 'asc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectFields);
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            'regulators' => [ 'objective' , 'fid' ]
        ]);

        $builder = $crud->getListBuilder();

        $responseData = $crud->pagination(true, $builder);
        
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        $responseData['user'] = $user ;
        return response()->json($responseData, 200);
    }
    /**
     * Listing of the global access folder
     */
    public function globalFolder(Request $request){
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 10 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;

        $queryString = [
            "where" => [
                'default' => [
                    [
                        'field' => 'accessibility' ,
                        'value' => 4
                    ]
                ],
                // 'in' => [
                //     [
                //         'field' => 'document_type' ,
                //         'value' => isset( $request->document_type ) && $request->document_type !== null ? [$request->document_type] : false
                //     ]
                // ] ,
                // 'not' => [
                //     // [
                //     //     'field' => 'field_name' ,
                //     //     'value' => [4]
                //     // ]
                // ] ,
                // 'like' => [
                //     [
                //         'field' => 'number' ,
                //         'value' => $number === false ? "" : $number
                //     ],
                //     [
                //         'field' => 'year' ,
                //         'value' => $date === false ? "" : $date
                //     ]
                // ] ,
            ] ,
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
                    'name'
                ]
            ],
            "order" => [
                'field' => 'name' ,
                'by' => 'asc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectFields);
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            'regulators' => [ 'objective' , 'fid' ] ,
            'user' => [ 'id' , 'lastname', 'firstname' ]
        ]);

        $builder = $crud->getListBuilder();
        $builder->has('regulators'); // Get only the folder which contains some regulators
        $responseData = $crud->pagination(true, $builder);
        
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData, 200);
    }
    /**
     * Get Folders of a specific user which has authenticated
     */
    public function user(Request $request){

        // Create Query Builder 
        $queryBuilder = new \App\Models\Folder\Folder();

        // Get search string
        if( $request->search != "" ){
            $searchTerms = explode(' ' , $request->search) ;
            if( is_array( $searchTerms ) && !empty( $searchTerms ) ){
                $queryBuilder = $queryBuilder -> where( function ($query ) use ( $searchTerms ) {
                    foreach( $searchTerms as $term ) {
                        $query = $query -> orwhere ( 'name', 'LIKE' , "%".$term."%") ;
                    }
                } );
            }
        }

        $queryBuilder = $queryBuilder->where('user_id', Auth::user()->id );

        $records = $queryBuilder->orderby('name','asc')->get()
                ->map( function ($record, $index) {
                    if( $record->regulators !== null ){
                        foreach( $record->regulators AS $index => $documentFolder ){
                            $documentFolder -> document ;
                            $documentFolder -> document -> type ;
                            $documentFolder -> document ->objective = strip_tags( $documentFolder -> document ->objective ) ; // clear some tags that product by the editor
                            $path = storage_path('data') . '/' . $documentFolder -> document -> pdf ; // create the link to pdf file
                            if( !is_file($path) ) $documentFolder -> document -> pdf = null ; // set the pdf link to null if it does not exist
                        }
                    }
                    return $record ;
                });

        return response([
            'ok' => true ,
            'records' => $records ,
            'message' => count( $records ) > 0 ? " មានថតឯកសារចំនូួន ៖ " . count( $records ) : "មិនមានថតឯកសារត្រូវជាមួយការស្វែងរកនេះឡើយ !"
        ],200 );
    }
    /**
     * Get Folders of a specific user which has authenticated
     * And also check the folder whether it does contain the document or not
     */
    public function listFolderWithRegulatorValidation(Request $request){

        // Create Query Builder 
        $queryBuilder = new \App\Models\Folder\Folder();

        // Get search string
        if( $request->search != "" ){
            $searchTerms = explode(' ' , $request->search) ;
            if( is_array( $searchTerms ) && !empty( $searchTerms ) ){
                $queryBuilder = $queryBuilder -> where( function ($query ) use ( $searchTerms ) {
                    foreach( $searchTerms as $term ) {
                        $query = $query -> orwhere ( 'name', 'LIKE' , "%".$term."%") ;
                    }
                } );
            }
        }

        $queryBuilder = $queryBuilder->where('user_id', Auth::user()->id );

        $records = $queryBuilder->orderby('name','asc')->get()
                ->map( function ($record, $index) use( $request ) {
                    return [
                        'id' => $record->id ,
                        'name' => $record->name ,
                        'exists' => $record->regulators !== null ? (
                            in_array( $request->regulator_id, $record->regulators->pluck('id')->toArray() )
                        ) : false
                    ];
                });

        return response([
            'ok' => true ,
            'records' => $records ,
            'message' => count( $records ) > 0 ? " មានថតឯកសារចំនូួន ៖ " . count( $records ) : "មិនមានថតឯកសារត្រូវជាមួយការស្វែងរកនេះឡើយ !"
        ],200 );
    }
    // Save the folder 
    public function create(Request $request){
        if( $request->name != "" 
        // && Auth::user() != null 
        ){
            $folder = new \App\Models\Folder\Folder();
            $folder->name = $request->name ;
            $folder->user_id = Auth::user() != null ? Auth::user()->id : 0 ;
            $folder->pid = 0 ;
            $folder->active = 1 ;
            $folder->save() ;
            $folder->user ;
            $folder->regulators ;
            // User does exists
            return response([
                'ok' => true ,
                'record' => $folder ,
                'message' => 'កម្រងឯកសារ '.$folder->name.' បានរក្សារួចរាល់ !' 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'user' => null ,
                'message' => 'សូមបញ្ចូលឈ្មោះកម្រងឯកសារជាមុនសិន !' ],
                201
            );
        }
    }
    // Update the folder 
    public function update(Request $request){
        if( ( $folder = RecordModel::find($request->id) ) != null && $request->name != "" ){
            $folder->name = $request->name ;
            $folder->save() ;
            $folder->user ;
            $folder->regulators ;
            // User does exists
            return response([
                'ok' => true ,
                'record' => $folder ,
                'message' => 'កម្រងឯកសារ '.$folder->name.' បានរក្សារួចរាល់ !' 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'user' => null ,
                'message' => 'មានបញ្ហាក្នុងពេលកែប្រែថតឯកសារ។' ],
                201
            );
        }
    }
    // delete the folder 
    public function delete(Request $request){
        if( $request->id != "" 
         // && Auth::user() != null 
        ){
            $folder = \App\Models\Folder\Folder::find($request->id);
            if( $folder != null ){
                $record = $folder ;
                // Check for the regulators within the folder
                // If there is/are regulators within the folder then notify user first
                // process delete , also delete the related document within this folder [Note: we only delete the relationship of folder and document]
                if( $folder->regulators !== null && $folder->regulators->count() ){
                    foreach( $folder -> regulators as $documentFolder ){
                        $documentFolder -> delete ();
                    }
                }
                $folder->delete();
                return response([
                    'ok' => true ,
                    'record' => $record ,
                    'message' => "កម្រងឯកសារ " . $record->name . " បានលុបរួចរាល់ !" 
                    ],
                    200
                );
            }else{
                return response([
                    'ok' => false ,
                    'record' => $folder ,
                    'message' => "កម្រងឯកសារនេះមិនមានឡើយ !"
                    ],
                    201
                );
            }
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'user' => null ,
                'message' => 'សូមបញ្ជាក់កម្រងឯកសារដែលអ្នកចង់លុប !' ],
                201
            );
        }
    }
    // Add document from folder
    public function addRegulatorToFolder(Request $request){
        if( $request->id > 0 && $request->regulator_id > 0 
          // && Auth::user() != null 
        ){
            $documentFolder = \App\Models\Regulator\RegulatorFolder::where('folder_id', $request->id )
                ->where('regulator_id' , $request->regulator_id )->first();
            if( $documentFolder == null ){
                $documentFolder = new \App\Models\Regulator\RegulatorFolder();
                $documentFolder -> folder_id = $request->id ;
                $documentFolder -> regulator_id = $request->regulator_id ;
                // $documentFolder -> created_by = $documentFolder -> updated_by = \Auth::user()->id ;
                $documentFolder->save();
                return response([
                    'ok' => true ,
                    'record' => $documentFolder ,
                    'message' => "បានបញ្ចូលឯកសារ ចូលទៅក្នុងកម្រងឯកសារ រួចរាល់ !"
                    ],
                    200
                );
            }else{
                return response([
                    'ok' => true ,
                    'record' => $documentFolder ,
                    'message' => "ឯកសារនេះមានក្នុងកម្រងឯកសារនេះរួចរាល់ហើយ !"
                    ],
                    201
                );
            }
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'record' => null ,
                'message' => 'សូមបំពេញព័ត៌មាន អោយបានគ្រប់គ្រាន់ !' ],
                201
            );
        }
    }
    // Remove document from folder
    public function removeRegulatorFromFolder(Request $request){
        if( $request->id > 0 && $request->regulator_id > 0 
        // && Auth::user() != null 
        ){
            $documentFolder = \App\Models\Regulator\RegulatorFolder::where('folder_id', $request->id )
                ->where('regulator_id' , $request->regulator_id )->first();
            $message = $documentFolder !== null ? "បានដកឯកសារចេញរួចរាល់។" : "មិនមានឯកសារនេះក្នុងថតឯកសារឡើយ។" ;
            if( $documentFolder != null ) {
                $documentFolder->delete();
            }
            return response([
                'ok' => true ,
                'record' => $documentFolder ,
                'message' => $message
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'record' => null ,
                'message' => 'សូមបំពេញព័ត៌មាន អោយបានគ្រប់គ្រាន់ !' ],
                201
            );
        }
    }
    public function checkRegulator(Request $request){
        $folder = RecordModel::find( $request->id );
        if( $folder !== null ){
            if( count( $folder -> regulators ) ){
                // There is/are document(s) within this folder
                return response([
                    'ok' => true ,
                    'record' => $folder ,
                    'message' => 'កម្រងឯកសារនេះ មានឯកសារចំនួន '. count( $folder -> regulators ) .' !' ],
                    200
                );
            }else{
                // There is no document within this folder
                return response([
                    'ok' => true ,
                    'record' => $folder ,
                    'message' => 'កម្រងឯកសារនេះ មិនមានឯកសារឡើយ !' ],
                    201
                );
            }
        }else{
            return response([
                'ok' => false ,
                'record' => null ,
                'message' => 'កម្រងឯកសារនេះ មិនមានឡើយ !' ],
                201
            );
        }
    }
    public function read(Request $request){
        if( !isset( $request->id ) || $request->id < 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់របស់ថតឯកសារ។'
            ],201);
        }
        $regulator = RecordModel::find($request->id);
        if( $regulator == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'ថតឯកសារដែលអ្នកត្រូវការមិនមានឡើយ។'
            ],201);
        }
        $regulator->with('ministries')->with('signatures')->with('ministries')->with('type');
        return response()->json([
            'record' => $regulator ,
            'ok' => true ,
            'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់ថតឯកសារ។'
        ],201);
    }
    /**
     * Listing regulators of the folder
     */
    public function regulators(Request $request){
        $user = Auth::user();

        /**
         * Geting all the regulators of the folder
         */
        if( !isset( $request->folder_id ) || $request->folder_id <= 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ចាក់លេខសម្គាល់របស់ថតឯកសារ។'
            ],350);
        }

        $regulatorIds = RecordModel::find($request->folder_id)->regulators->pluck('id')->all();
        if( count( $regulatorIds ) <= 0 ) {
            return response()->json([
                'ok' => false ,
                'message' => 'ថតឯកសារនេះមិនមានឯកសារឡើយ។'
            ],350);
        }
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 10 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;

        $queryString = [
            "where" => [
                // // 'default' => [
                //     [
                //         'field' => 'user_id' ,
                //         'value' => $user->id
                //     ]
                // ],
                // 'in' => [
                //     [
                //         'field' => 'document_type' ,
                //         'value' => isset( $request->document_type ) && $request->document_type !== null ? [$request->document_type] : false
                //     ]
                // ] ,
                    'in' => [
                        [
                            'field' => 'id' ,
                            'value' => $regulatorIds
                        ]
                    ]
                // 'not' => [
                //     // [
                //     //     'field' => 'field_name' ,
                //     //     'value' => [4]
                //     // ]
                // ] ,
                // 'like' => [
                //     [
                //         'field' => 'number' ,
                //         'value' => $number === false ? "" : $number
                //     ],
                //     [
                //         'field' => 'year' ,
                //         'value' => $date === false ? "" : $date
                //     ]
                // ] ,
            ] ,
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
                    'objective'
                ]
            ],
            "order" => [
                'field' => 'objective' ,
                'by' => 'asc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new \App\Models\Regulator\Regulator(), $request, [
            'id',
            'fid' ,
            'title' ,
            'objective',
            'year' ,
            'pdf' ,
            'publish'
        ],[
            /**
             * custom the value of the field
             */
            'pdf' => function($record){
                $record->pdf = ( $record->pdf !== "" && $record->pdf !== null && \Storage::disk('document')->exists( $record->pdf ) )
                ? true
                // \Storage::disk('regulator')->url( $pdf ) 
                : false ;
                return $record->pdf ;
            },
            'objective' => function($record){
                return html_entity_decode( strip_tags( $record->objective ) );
            }
        ]);
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            'regulators' => [ 'objective' , 'fid' ] ,
            'user' => [ 'id' , 'lastname', 'firstname' ] ,
            'types' => [ 'id' , 'name' , 'desp' , 'pid' ] ,
            'ministries' => [ 'id' , 'name' , 'desp' , 'pid' ] ,
            'signatures' => [ 'id' , 'name' , 'desp' , 'pid' ]
        ]);

        $builder = $crud->getListBuilder();

        $responseData = $crud->pagination(true, $builder);
        
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        // $responseData['folderIds'] = $folderIds ;
        // $responseData['sql'] = $builder->toSql();
        return response()->json($responseData, 200);
    }
    public function accessibility(Request $request){
        if( !isset( $request->id ) || $request->id < 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់ថតឯកសារ។'
            ],422);
        }
        $record = RecordModel::find($request->id);
        if( $record == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'ថតឯកសារដែលអ្នកត្រូវការមិនមានឡើយ។'
            ],423);
        }
        $result = in_array( intVal( $request->mode ) , [ 0 , 1 , 2 , 4 ] ) != false ? $record->update(['accessibility'=> intVal( $request->mode ) ] ) : false ;
        return response()->json([
            'record' => $result == false ? null : $record ,
            'ok' =>  $result == false ? false : true ,
            'message' => $result == false ? "មានបញ្ហាក្នុងការកែប្រែ។" : 'បានកែរួចរាល់។'
        ], $result == false ? 422 : 200 );
    }
}
