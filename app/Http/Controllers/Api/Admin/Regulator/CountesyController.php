<?php

namespace App\Http\Controllers\Api\Admin\Regulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\Regulator\Tag\Countesy as RecordModel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class CountesyController extends Controller
{
    private $model = null ;
    private $fields = [ 'id','name','desp' , 'pid' , 'model' , 'tpid' , 'record_index' , 'active' , 'image' , 'pdf' ] ;
    private $renameFields = [
        'pid' => 'parentId'
    ];
    public function __construct(){
        $this->model = new RecordModel();
    }
    /**
     * Listing function
     */
    public function index(Request $request){
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? intval( $request->perPage ) : 50 ;
        $page = isset( $request->page ) && $request->page !== "" ? intval( $request->page ) : 1 ;
        $parentNode = isset( $request->id ) && intval( $request->id ) > 0? RecordModel::find( $request->id ) : null ;
        $queryString = [
            "where" => [
                'default' => [
                    [
                        'field' => 'model' ,
                        'value' => get_class( $this->model )
                    ],
                    $parentNode != null && $parentNode->id > 0 ? [
                        'field' => 'pid' ,
                        'value' => $parentNode->id
                    ] : [] ,
                ],
                'like' => [
                    $parentNode != null && $parentNode->id > 0 ? [
                        'field' => 'tpid' ,
                        'value' => ( intval( $parentNode->pid ) > 0 ? $parentNode->pid.":" : '' ) . $parentNode->id . "%"
                    ] : []
                ]
            ] ,
            "pagination" => [
                'perPage' => $perPage,
                'page' => $page
            ],
            "search" => $search === false ? [] : [
                'value' => $search ,
                'fields' => [
                    'name' , 'desp'
                ]
            ],
            "order" => [
                'field' => 'record_index' ,
                'by' => 'asc'
            ],
        ];
        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->fields , [
            'image' => function($record){
                $record->image = ( strlen( $record->image ) > 0 && \Storage::disk('public')->exists( $record->image ) )
                ? \Storage::disk('public')->url( $record->image )
                : false ;
                return $record->image ;
            },
            'pdf' => function($record){
                $record->pdf = ( strlen( $record->pdf ) > 0 && \Storage::disk('countesy')->exists( $record->pdf ) )
                ? true
                : false ;
                return $record->pdf ;
            }
        ] , $this->renameFields , [
            // 'totalChilds' => function($record){
            //     return $record->totalChildNodesOfAllLevels();
            // },
            // 'totalStaffsOfAllLevels' => function($record){
            //     return $record->totalStaffsOfAllLevels();
            // },
            // 'totalLeaders' => function($record){
            //     return $record->leader == null ? 0 : $record->leader->count();
            // },
            // 'totalStaffs' => function($record){
            //     return $record->staffs == null ? 0 : $record->staffs->count();
            // },
            // 'pid' => function($record){
            //     return $record->pid;
            // }
        ] );

        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            // 'leader' => [ 
            //     'id' , 'firstname' , 'lastname' , 'image' 
            //     , 'organizations' => [ 'id' , 'name', 'desp' ]
            //     , 'positions' => [ 'id' , 'name', 'desp' ]
            //     , 'countesies' => [ 'id' , 'name', 'desp' ]
            // ] ,
            // 'staffs' => [ 
            //     'id' , 'firstname' , 'lastname' , 'image' 
            //     // , 'organizations' => [ 'id' , 'name', 'desp' ]
            //     // , 'positions' => [ 'id' , 'name', 'desp' ]
            //     // , 'countesies' => [ 'id' , 'name', 'desp' ]
            // ],
            'parentNode' => [
                'id' , 'name'
            ],
            'childNodes' => [
                'id' , 'name'
            ]
        ]);

        $builder = $crud->getListBuilder();
        $builder->whereNull( 'deleted_at' );
        $responseData = $crud->pagination(true , $builder );
        // $responseData['records'] = $responseData['records']->prepend( $root );
        // $responseData['records'] = $responseData['records']->map(function($organization){
        //     $org = \App\Models\Regulator\Tag\Organization::find( $organization['id'] ) ;
        //     $organization['staffs'] = $org != null ? $org->staffs->map(function($staff){
        //         $staff->organizations;
        //         $staff->positions;
        //         $staff->countesies;
        //         return $staff ;
        //     }) : [] ;
        //     $organization['leader'] = $org != null ? $org->leader->map(function($leader){
        //         $leader->organizations;
        //         $leader->positions;
        //         $leader->countesies;
        //         return $leader ;
        //     }) : [] ;
        //     return $organization;
        // });
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData);
    }
    /**
     * Listing function
     */
    public function listByParent(Request $request){
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? intval( $request->perPage ) : 50 ;
        $page = isset( $request->page ) && $request->page !== "" ? intval( $request->page ) : 1 ;
        $id = intval( $request->id ) > 0 ? intval( $request->id ) : false ;
        $root = $id
            ? RecordModel::where('id',$id)->first()
            : RecordModel::where('model', get_class( $this->model ) )->first();
        $root->totalChilds = $root->totalChildNodesOfAllLevels();

        $queryString = [
            "where" => [
                // 'default' => [
                //     $pid > 0 ? [
                //         'field' => 'pid' ,
                //         'value' => $pid
                //     ] : [] ,
                // ],
                
                // 'in' => [] ,

                // 'not' => [
                //     [
                //         'field' => 'id' ,
                //         'value' => 4
                //     ]
                // ] ,
                'like' => [
                    [
                        'field' => 'tpid' ,
                        'value' => ( intval( $root->pid ) > 0 ? $root->pid.":" : '' ) . $root->id . "%"
                    ],
                    // [
                    //     'field' => 'year' ,
                    //     'value' => $date === false ? "" : $date
                    // ]
                ] ,
            ] ,
            "pagination" => [
                'perPage' => $perPage,
                'page' => $page
            ],
            "search" => $search === false ? [] : [
                'value' => $search ,
                'fields' => [
                    'name' , 'desp'
                ]
            ],
            "order" => [
                'field' => 'record_index' ,
                'by' => 'asc'
            ]
        ];
        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->fields , false , $this->renameFields , [
            'totalChilds' => function($record){
                return $record->totalChildNodesOfAllLevels();
            }
        ] );

        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            'leader' => [ 
                'id' , 'firstname' , 'lastname' , 'image' 
                , 'organizations' => [ 'id' , 'name', 'desp' ]
                , 'positions' => [ 'id' , 'name', 'desp' ]
                , 'countesies' => [ 'id' , 'name', 'desp' ]
            ] ,
            'staffs' => [ 
                'id' , 'firstname' , 'lastname' , 'image' 
                // , 'organizations' => [ 'id' , 'name', 'desp' ]
                // , 'positions' => [ 'id' , 'name', 'desp' ]
                // , 'countesies' => [ 'id' , 'name', 'desp' ]
            ]
        ]);

        $builder = $crud->getListBuilder();
        
        // $builder->where('tpid', "LIKE" , ( intval( $root->pid ) > 0 ? $root->pid.":" : '' ) . $root->id . "%" );
        $root->parentId = null ;

        $root->leader = $root->leader != null
            ? $root->leader->map(function($leader){
                $leader->organizations;
                $leader->positions;
                $leader->countesies;
                return $leader ;
            }) : [] ;

        // $root->staffs = $root->staffs != null
        // ? $root->staffs->map(function($staff){
        //     $staff->organizations;
        //     $staff->positions;
        //     $staff->countesies;
        //     return $staff ;
        // }) : [] ;

        $responseData = $crud->pagination(true , $builder );
        $responseData['records'] = $responseData['records']->prepend( $root );
        // $responseData['records'] = $responseData['records']->map(function($organization){
        //     $org = \App\Models\Regulator\Tag\Organization::find( $organization['id'] ) ;
        //     $organization['staffs'] = $org != null ? $org->staffs->map(function($staff){
        //         $staff->organizations;
        //         $staff->positions;
        //         $staff->countesies;
        //         return $staff ;
        //     }) : [] ;
        //     $organization['leader'] = $org != null ? $org->leader->map(function($leader){
        //         $leader->organizations;
        //         $leader->positions;
        //         $leader->countesies;
        //         return $leader ;
        //     }) : [] ;
        //     return $organization;
        // });
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData);
    }
    /** Mini display */
    public function compact(Request $request)
    {
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 1000 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        $parentNode = isset( $request->id ) && intval( $request->id ) > 0? RecordModel::find( $request->id ) : null ;

        // $root = $id > 0 
        //     ? RecordModel::where('id',$id)->first()
        //     : RecordModel::where('model', get_class( $this->model ) )->first();
        // if( $root == null ){
        //     return response()->json([
        //         'ok' => false ,
        //         'message' => 'តួនាទីនេះមិនមានឡើយ។'
        //     ],422);
        // }

        $queryString = [
            "where" => [
                'default' => [
                    [
                        'field' => 'model' ,
                        'value' => get_class( $this->model )
                    ],
                    $parentNode != null && $parentNode->id > 0 ? [
                        'field' => 'pid' ,
                        'value' => $parentNode->id
                    ] : [] ,
                ],
                
                // 'in' => [] ,

                // 'not' => [
                //     [
                //         'field' => 'id' ,
                //         'value' => 4
                //     ]
                // ] ,
                // 'like' => [
                //     [
                //         'field' => 'tpid' ,
                //         'value' => ( intval( $root->pid ) > 0 ? $root->pid.":" : '' ) . $root->id . "%"
                //     ],
                //     // [
                //     //     'field' => 'year' ,
                //     //     'value' => $date === false ? "" : $date
                //     // ]
                // ] ,
            ] ,
            "pagination" => [
                'perPage' => $perPage,
                'page' => $page
            ],
            "search" => $search === false ? [] : [
                'value' => $search ,
                'fields' => [
                    'name' , 'desp'
                ]
            ],
            "order" => [
                'field' => 'record_index' ,
                'by' => 'asc'
            ],
        ];
        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->fields );

        $builder = $crud->getListBuilder();
        $builder->whereNull('deleted_at');
        $responseData = $crud->pagination(true , $builder );

        $responseData['records'] = $responseData['records'];
        // ->prepend( $root );
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData);
    }
    public function read(Request $request){
        if( !isset( $request->id ) || $request->id < 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់។'
            ],201);
        }
        $record = RecordModel::find($request->id);
        if( $record == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'មិនមានព័ត៌មាននេះឡើយ។'
            ],201);
        }
        return response()->json([
            'record' => $record ,
            'ok' => true ,
            'message' => 'រួចរាល់'
        ],200);
    }
    /**
     * Create an account
     */
    public function store(Request $request){
        // Get parent
        $parentNode = isset( $request->pid ) && intval( $request->pid ) > 0 ? RecordModel::find( $request->pid ) : RecordModel::where('model',get_class( $this->model ))->first() ;
        // អ្នកប្រើប្រាស់ មិនទាន់មាននៅឡើយទេ
        $record = RecordModel::create([
            'name' => $request->name,
            'desp' => $request->desp ,
            'model' => get_class( $this->model ) // ,
            // 'pid' => $parentNode != null && $parentNode->id > 0 
            //     ? $parentNode->id 
            //     : null ,
            // 'tpid' => $parentNode != null && $parentNode->id > 0
            //     ?(
            //         $parentNode->tpid != null && $parentNode->tpid != "" 
            //             ? $parentNode->tpid .':'. $parentNode->id 
            //             : $parentNode->id
            //     )
            //     : null
        ]);

        if( $record ){
            return response()->json([
                'record' => $record ,
                'ok' => true ,
                'message' => 'បង្កើតបានរួចរាល់'
            ], 200);

        }else {
            return response()->json([
                'user' => null ,
                'ok' => false ,
                'message' => 'មានបញ្ហា។'
            ], 201);
        }
    }
    /**
     * Create child
     */
    public function addChild(Request $request){
        $parent = intval( $request->pid ) > 0 
            ? RecordModel::find($request->pid) 
            : null ;
        $child = intval( $request->cid ) > 0 
            ? RecordModel::find($request->cid) 
            : null ;
        if( $parent == null || $child == null ){
            return response()->json([
                'ok' => false ,
                'message' => "សូមជ្រើសរើស តួនាទី "
            ],350);
        }
        $child->pid = $parent->id ;
        $child->save();
        return response()->json([
            'child' => $child ,
            'parent' => $parent ,
            'ok' => true ,
            'message' => 'បានភ្ជាប់អង្គភាបចំណុះរួចរាល់។'
        ], 200);
    }
    /**
     * Update an account
     */
    public function update(Request $request){
        $record = isset( $request->id ) && intval( $request->id ) > 0 ? RecordModel::find($request->id) : null ;
        if( $record == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'តួនាទីនេះមិនមានឡើយ។'
            ],403);
        }
        $updateData = [
            'name' => $request->name ,
            'desp' => $request->desp
        ];
        $record->update( $updateData );
        return response()->json([
            'record' => $record ,
            'message' => 'កែប្រែព័ត៌មានរួចរាល់ !' ,
            'ok' => true
        ], 200);
    }
    /**
     * Active function of the account
     */
    public function active(Request $request){
        $record = RecordModel::find($request->id) ;
        if( $record ){
            $record->active = $request->active ;
            $record->save();
            // record does exists
            return response([
                'record' => $record ,
                'ok' => true ,
                'message' => 'ជោគជ័យ !' 
                ],
                200
            );
        }else{
            // record does not exists
            return response([
                'record' => null ,
                'ok' => false ,
                'message' => 'សូមទោស មិនមានទេ !' 
                ],
                201
            );
        }
    }
    /**
     * Unactive function of the account
     */
    public function unactive(Request $request){
        $record = RecordModel::find($request->id) ;
        if( $record ){
            $record->active = 0 ;
            $record->save();
            // Urecordser does exists
            return response([
                'ok' => true ,
                'record' => $record ,
                'message' => 'ជោគជ័យ !' 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'record' => null ,
                'ok' => false ,
                'message' => 'សូមទោសមិនមានទេ !' ],
                201
            );
        }
    }
    /**
     * Function delete an account
     */
    public function destroy(Request $request){
        $record = RecordModel::find($request->id) ;
        if( $record ){
            $record->deleted_at = \Carbon\Carbon::now() ;
            $record->save();
            // User does exists
            return response([
                'ok' => true ,
                'record' => $record ,
                'message' => ' បានលុបដោយជោគជ័យ !' ,
                'ok' => true 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'ok' => false ,
                'record' => null ,
                'message' => 'សូមទោស ព័ត៌មាននេះមិនមានទេ !' ],
                201
            );
        }
    }
    /**
     * Get staffs of the organization
     */
    public function staffs(Request $request){

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
     * Listing regulators of the organization
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
            'document_type' ,
            'publish'
        ]);
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
        ]);

        $builder = $crud->getListBuilder();

        $responseData = $crud->pagination(true, $builder,
            [
                'field' => 'pdf' ,
                'callback'=> function($pdf){
                    $pdf = ( $pdf !== "" && \Storage::disk('public')->exists( $pdf ) )
                    ? \Storage::disk('public')->url( $pdf ) : null ;
                    return $pdf ;
                }
            ]
        );
        
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        // $responseData['folderIds'] = $folderIds ;
        // $responseData['sql'] = $builder->toSql();
        return response()->json($responseData, 200);
    }
    /**
     * Set leader
     */
    public function setLeader(Request $request){
        $record = isset( $request->organization_id ) && $request->organization_id > 0 ? RecordModel::find($request->organization_id) : false ;
        if( $record ) {
            if( intval( $request->people_id ) > 0 ){
                $record->leader()->sync([$request->people_id]);
            }else{
                $record->leader()->sync([]);
            }
            $record->leader = $record->leader->map(function( $leader ){
                $leader->positions;
                $leader->countesies;
                return $leader ;
            });
            $record->staffs = $record->staffs->map(function( $staff ){
                $staff->positions;
                $staff->countesies;
                return $staff ;
            });
            return response()->json([
                'record' => $record ,
                'message' => 'ជោគជ័យ!' ,
                'ok' => true
            ], 200);
        }else{
            // អ្នកប្រើប្រាស់មិនមាន
            return response([
                'record' => null ,
                'message' => 'មានបញ្ហាពេលកំណត់ថ្នាក់ដឹកនាំសម្រាប់ក្រសួង ស្ថាប័ន។' ,
                'ok' => false
            ], 500);
        }
    }
    /**
     * Get people within the orgainzation
     */
    public function people(Request $request ){
        $record = isset( $request->id ) && $request->id > 0 ? RecordModel::find($request->id) : false ;
        if( $record ) {
            $record->leader = $record->leader->map(function( $leader ){
                $leader->positions;
                $leader->countesies;
                return $leader ;
            });
            $record->staffs = $record->staffs->map(function( $staff ){
                $staff->positions;
                $staff->countesies;
                return $staff ;
            });
            return response()->json([
                'record' => $record ,
                'message' => 'ជោគជ័យ!' ,
                'ok' => true
            ], 200);
        }else{
            // អ្នកប្រើប្រាស់មិនមាន
            return response([
                'record' => null ,
                'message' => 'មានបញ្ហាក្នុងពេលអានព័ត៌មាន សមាសភាព ក្នុងក្រសួងស្ថាប័ន។' ,
                'ok' => false
            ], 500);
        }
    }
    public function addPeopleToOrganization(Request $request ){
        $record = isset( $request->organization_id ) && $request->organization_id > 0 ? RecordModel::find($request->organization_id) : false ;
        if( $record ) {
            if( intval( $request->people_id ) > 0 ){
                $record->staffs()->toggle([$request->people_id]);
            }
            $record->leader = $record->leader->map(function( $leader ){
                $leader->positions;
                $leader->countesies;
                return $leader ;
            });
            $record->staffs = $record->staffs->map(function( $staff ){
                $staff->positions;
                $staff->countesies;
                return $staff ;
            });
            return response()->json([
                'record' => $record ,
                'message' => 'ជោគជ័យ!' ,
                'ok' => true
            ], 200);
        }else{
            // អ្នកប្រើប្រាស់មិនមាន
            return response([
                'record' => null ,
                'message' => 'មានបញ្ហាពេលកំណត់ថ្នាក់ដឹកនាំសម្រាប់ក្រសួង ស្ថាប័ន។' ,
                'ok' => false
            ], 500);
        }
    }
    public function uploadPicture(Request $request){
        $user = \Auth::user();
        if( $user ){
            $phpFileUploadErrors = [
                0 => 'មិនមានបញ្ហាជាមួយឯកសារឡើយ។',
                1 => "ទំហំឯកសារធំហួសកំណត់ " . ini_get("upload_max_filesize"),
                2 => 'ទំហំឯកសារធំហួសកំណត់នៃទំរង់បញ្ចូលទិន្នន័យ ' . ini_get('post_max_size'),
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            ];
            if( isset( $_FILES['files'] ) && $_FILES['files']['error'] > 0 ){
                return response()->json([
                    'ok' => false ,
                    'message' => $phpFileUploadErrors[ $_FILES['files']['error'] ]
                ],403);
            }
            $kbFilesize = round( filesize( $_FILES['files']['tmp_name'] ) / 1024 , 4 );
            $mbFilesize = round( $kbFilesize / 1024 , 4 );
            if( ( $record = RecordModel::find($request->id) ) !== null ){
                $uniqeName = Storage::disk('public')->putFile( 'positions/'.$user->id , new File( $_FILES['files']['tmp_name'] ) );
                $record->image = $uniqeName ;
                $record->save();
                if( $record->image != null && strlen( $record->image ) > 0 && Storage::disk('public')->exists( $record->image ) ){
                    $record->image = Storage::disk("public")->url( $record->image  );
                    return response([
                        'record' => $record ,
                        'ok' => true ,
                        'message' => 'ជោគជ័យ។'
                    ],200);
                }else{
                    return response([
                        'record' => $record ,
                        'ok' => false ,
                        'message' => 'មិនមានតួនាទីដែលស្វែងរកឡើយ។'
                    ],403);
                }
            }else{
                return response([
                    'ok' => false ,
                    'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់របស់តួនាទី។'
                ],403);
            }
        }else{
            return response([
                'ok' => false ,
                'message' => 'សូមចូលប្រព័ន្ធជាមុនសិន។'
            ],403);
        }
    }
    public function uploadPdf(Request $request){
        $user = \Auth::user();
        if( $user ){
            $phpFileUploadErrors = [
                0 => 'មិនមានបញ្ហាជាមួយឯកសារឡើយ។',
                1 => "ទំហំឯកសារធំហួសកំណត់ " . ini_get("upload_max_filesize"),
                2 => 'ទំហំឯកសារធំហួសកំណត់នៃទំរង់បញ្ចូលទិន្នន័យ ' . ini_get('post_max_size'),
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            ];
            if( isset( $_FILES['files'] ) && $_FILES['files']['error'] > 0 ){
                return response()->json([
                    'ok' => false ,
                    'message' => $phpFileUploadErrors[ $_FILES['files']['error'] ]
                ],403);
            }
            $kbFilesize = round( filesize( $_FILES['files']['tmp_name'] ) / 1024 , 4 );
            $mbFilesize = round( $kbFilesize / 1024 , 4 );
            if( ( $record = RecordModel::find($request->id) ) !== null ){
                $uniqeName = Storage::disk('countesy')->putFile( '' , new File( $_FILES['files']['tmp_name'] ) );
                $record->pdf = $uniqeName ;
                $record->save();
                if( Storage::disk('countesy')->exists( $record->pdf ) ){
                    // $record->pdf = Storage::disk("position")->url( $record->pdf  );
                    $record->pdf = true ;
                    return response([
                        'record' => $record ,
                        'message' => 'ជោគជ័យ។'
                    ],200);
                }else{
                    return response([
                        'record' => $document ,
                        'message' => 'មិនមានតួនាទីដែលស្វែងរកឡើយ។'
                    ],403);
                }
            }else{
                return response([
                    'message' => 'សូមបញ្ជាក់អំពីលេខសម្គាល់របស់តួនាទី។'
                ],403);
            }
        }else{
            return response([
                'message' => 'សូមចូលប្រព័ន្ធជាមុនសិន។'
            ],403);
        }
    }
    /**
     * View the pdf file
     */
    public function pdf(Request $request)
    {
        $record = RecordModel::findOrFail($request->id);
        if($record) {
            $pathPdf = storage_path('data') . '/countesies/' . $record->pdf ;
            $ext = pathinfo($pathPdf);
            $filename = md5($record->id) . '.pdf';
            if(file_exists( $pathPdf ) && is_file($pathPdf)) {
                $pdfBase64 = base64_encode( file_get_contents( $pathPdf ) );  
                return response([
                    "pdf" => 'data:application/pdf;base64,' . $pdfBase64 ,
                    "filename" => $filename,
                    "ok" => true 
                ],200);
            }else{
                return response([
                    'message' => 'មានបញ្ហាក្នុងការអានឯកសារយោង !' ,
                    'path' => $pathPdf
                ],500 );
            }
        }
    }
}
