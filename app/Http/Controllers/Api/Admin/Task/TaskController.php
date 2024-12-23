<?php
namespace App\Http\Controllers\Api\Admin\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task\Task AS RecordModel;
use App\Models\Task\TaskAssignment;
use App\Http\Controllers\CrudController;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    private $selectedFields = ['id', 'objective','minutes', 'start', 'end', 'created_at','created_by','status','pid' , 'active' , 'pdf' , 'image' ];
    /** Get a list of Tasks */
    public function index(Request $request){

        $user = \Auth::user();
        if( $user == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមចូលប្រើប្រាស់ជាមុនសិន។'
            ],403);
        }
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 50 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        // $number = isset( $request->number ) && $request->number !== "" ? $request->number : false ;
        // $type = isset( $request->type ) && $request->type !== "" ? $request->type : false ;
        // $unit = isset( $request->unit ) && $request->unit !== "" ? $request->unit : false ;
        // $date = isset( $request->date ) && $request->date !== "" ? $request->date : false ;


        $queryString = [
            "where" => [
                'default' => [
                    $user->hasRole('admin') || $user->hasRole('super')
                        ? [] 
                        : (
                            $user->id > 0 
                                ? [ 'field' => 'created_by' ,'value' => $user->id ]
                                : []
                        )
                ],
                // 'in' => [] ,
                // 'not' => [] ,
                // 'like' => [
                //     [
                //         'field' => 'objective' ,
                //         'value' => $search
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
            //         //         "field" => 'fieldobjective' ,
            //         //         "value"=> 'value'
            //         //     ]
            //         // ],
            //         // "like"=>  [
            //         //     [
            //         //        "field"=> 'fieldobjective' ,
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
                    'objective', 'start' , 'end'
                ]
            ],
            "order" => [
                'field' => 'created_at' ,
                'by' => 'desc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectedFields , [
            'image' => function($record){
                $record->image = ( strlen( $record->image ) > 0 && \Storage::disk('public')->exists( $record->image ) )
                ? \Storage::disk('public')->url( $record->image )
                : false ;
                return $record->image ;
            },
            'pdf' => function($record){
                $record->pdf = ( strlen( $record->pdf ) > 0 && \Storage::disk('task')->exists( $record->pdf ) )
                ? true
                : false ;
                return $record->pdf ;
            }
        ] );
        $crud->setRelationshipFunctions([
            /** relationship objective => [ array of fields objective to be selected ] */
            'creator' => ['id', 'firstname', 'lastname' ,'phone', 'avatar_url' , 'image' ] ,
            'assignees' => ['id', 'firstname', 'lastname' ,'phone', 'image' ] ,
            'assignors' => ['id', 'firstname', 'lastname' ,'phone', 'image' ] ,
            'ancestor' => ['id', 'objective','minutes', 'start', 'end', 'created_at','created_by','status','pid'] ,
            'children' => ['id', 'objective','minutes', 'start', 'end', 'created_at','created_by','status','pid'] ,
            'childrenAllLevels' => ['id', 'objective','minutes', 'start', 'end', 'created_at','created_by','status','pid'] 
        ]);
        $builder = $crud->getListBuilder();

        /** Filter the record by the user role */
        // if( ( $user = $request->user() ) !== null ){
        //     /** In case user is the administrator, all archives will show up */
        //     if( array_intersect( $user->roles()->pluck('id')->toArray() , [2,3,4] ) ){
        //         /** In case user is the super, auditor, member then the archives will show up if only that archives are own by them */
        //         $builder->where('created_by',$user->id);
        //     }else{
        //         /** In case user is the customer */
        //         /** Filter archives by its type before showing to customer */
        //     }
        // }

        $responseData = $crud->pagination(true, $builder);
        $responseData['records'] = $responseData['records']->map(function($task){
            $task['creator']['avatar_url'] = ( $task['creator']['avatar_url'] != null && $task['creator']['avatar_url'] != "" && \Storage::disk( 'public' )->exists( $task['creator']['avatar_url'] ) )
                ? \Storage::disk('public')->url( $task['creator']['avatar_url'] ) 
                : null ;
            $task['creator']['image'] = ( $task['creator']['image'] != null && $task['creator']['image'] != "" && \Storage::disk( 'public' )->exists( $task['creator']['image'] ) )
                ? \Storage::disk('public')->url( $task['creator']['image'] ) 
                : null ;
            return $task ;
        });
        $responseData['message'] = __("crud.read.success");
        return response()->json($responseData, 200);
    }
    /** Get a list of Tasks as schedule */
    public function schedule(Request $request){

        $user = \Auth::user();
        if( $user == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមចូលប្រើប្រាស់ជាមុនសិន។'
            ],403);
        }
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 50 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        // $number = isset( $request->number ) && $request->number !== "" ? $request->number : false ;
        // $type = isset( $request->type ) && $request->type !== "" ? $request->type : false ;
        // $unit = isset( $request->unit ) && $request->unit !== "" ? $request->unit : false ;
        // $date = isset( $request->date ) && $request->date !== "" ? $request->date : false ;


        $queryString = [
            "where" => [
                'default' => [
                    $user->hasRole('admin') || $user->hasRole('super')
                        ? [] 
                        : (
                            $user->id > 0 
                                ? [ 'field' => 'created_by' ,'value' => $user->id ]
                                : []
                        )
                ],
                // 'in' => [] ,
                // 'not' => [] ,
                // 'like' => [
                //     [
                //         'field' => 'objective' ,
                //         'value' => $search
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
            //         //         "field" => 'fieldobjective' ,
            //         //         "value"=> 'value'
            //         //     ]
            //         // ],
            //         // "like"=>  [
            //         //     [
            //         //        "field"=> 'fieldobjective' ,
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
                    'objective', 'start' , 'end' , 'minutes'
                ]
            ],
            "order" => [
                'field' => 'created_at' ,
                'by' => 'desc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectedFields );
        $builder = $crud->getListBuilder();
        $builder->whereNull('pid')->orWhere('pid',0);

        // $responseData = $crud->pagination(true, $builder);
        $responseData['records'] = $builder->get()->map(function( $task ){
            
            $task->image = ( strlen( $task->image ) > 0 && \Storage::disk('public')->exists( $task->image ) )
                ? \Storage::disk('public')->url( $task->image )
                : false ;

            $task->pdf = ( strlen( $task->pdf ) > 0 && \Storage::disk('task')->exists( $task->pdf ) )
                ? true
                : false ;

            $task->creator = $task->creator == null 
                ? null 
                : [
                    'id' => $task->creator->id ,
                    'firstname' => $task->creator->firstname ,
                    'lastname' => $task->creator->lastname ,
                    'phone' => $task->creator->phone ,
                    'email' => $task->creator->email ,
                    'avatar_url' => strlen( $task->creator->avatar_url ) > 0 && \Storage::disk('public')->exists( $task->creator->avatar_url )
                        ? \Storage::disk('public')->url( $task->creator->avatar_url ) 
                        : false ,
                    'image' => strlen( $task->creator->image ) > 0 && \Storage::disk('public')->exists( $task->creator->image )
                        ? \Storage::disk('public')->url( $task->creator->image ) 
                        : false
                ];

            $task->assignees = $task->assignees != null && !$task->assignees->isEmpty()
                ? $task->assignees->map(function( $assignee ){
                    return [
                        'id' => $assignee->id ,
                        'firstname' => $assignee->firstname ,
                        'lastname' => $assignee->lastname ,
                        'phone' => $assignee->phone ,
                        'email' => $assignee->email ,
                        'avatar_url' => strlen( $assignee->avatar_url ) > 0 && \Storage::disk('public')->exists( $assignee->avatar_url )
                            ? \Storage::disk('public')->url( $assignee->avatar_url ) 
                            : false ,
                        'image' => strlen( $assignee->image ) > 0 && \Storage::disk('public')->exists( $assignee->image )
                            ? \Storage::disk('public')->url( $assignee->image ) 
                            : false
                    ];
                })
                : [] ;

            $task->assignors = $task->assignors != null && !$task->assignors->isEmpty()
                ? $task->assignors->map(function( $assignor ){
                    return [
                        'id' => $assignor->id ,
                        'firstname' => $assignor->firstname ,
                        'lastname' => $assignor->lastname ,
                        'phone' => $assignor->phone ,
                        'email' => $assignor->email ,
                        'avatar_url' => strlen( $assignor->avatar_url ) > 0 && \Storage::disk('public')->exists( $assignor->avatar_url )
                            ? \Storage::disk('public')->url( $assignor->avatar_url ) 
                            : false ,
                        'image' => strlen( $assignor->image ) > 0 && \Storage::disk('public')->exists( $assignor->image )
                            ? \Storage::disk('public')->url( $assignor->image ) 
                            : false
                    ];
                })
                : [] ;
            
            $task->ancestor = $task->ancestor == null 
                ? null 
                : [
                    'id' => $task->ancestor->id ,
                    'objective' => $task->ancestor->objective ,
                    'minutes' => $task->ancestor->minutes ,
                    'start' => $task->ancestor->start ,
                    'end' => $task->ancestor->end ,
                    'created_at' => $task->ancestor->created_at ,
                    'creator' => $task->ancestor->creator == null
                        ? null
                        : [
                            'id' => $task->ancestor->creator->id ,
                            'firstname' => $task->ancestor->creator->firstname ,
                            'lastname' => $task->ancestor->creator->lastname ,
                            'phone' => $task->ancestor->creator->phone ,
                            'email' => $task->ancestor->creator->email ,
                            'avatar_url' => strlen( $task->ancestor->creator->avatar_url ) > 0 && \Storage::disk('public')->exists( $task->ancestor->creator->avatar_url )
                                ? \Storage::disk('public')->url( $task->ancestor->creator->avatar_url ) 
                                : false ,
                            'image' => strlen( $task->ancestor->creator->image ) > 0 && \Storage::disk('public')->exists( $task->ancestor->creator->image )
                                ? \Storage::disk('public')->url( $task->ancestor->creator->image ) 
                                : false
                        ] ,
                    'status' => $task->ancestor->status ,
                    'pid' => $task->ancestor->pid
                ];

            // $task->children = is_array( $task->children ) && !empty( $task->children )
            //     ? $task->children->map(function( $child ){
            //         return [
            //             'id' => $child->id ,
            //             'objective' => $child->objective ,
            //             'minutes' => $child->minutes ,
            //             'start' => $child->start ,
            //             'end' => $child->end ,
            //             'created_at' => $child->created_at ,
            //             'created_by' => $child->created_by == null
            //                 ? null
            //                 : [
            //                     'id' => $child->created_by->id ,
            //                     'firstname' => $child->created_by->firstname ,
            //                     'lastname' => $child->created_by->lastname ,
            //                     'phone' => $child->created_by->phone ,
            //                     'email' => $child->created_by->email ,
            //                     'avatar_url' => strlen( $child->created_by->avatar_url ) > 0 && \Storage::disk('public')->exists( $child->created_by->avatar_url )
            //                         ? \Storage::disk('public')->url( $child->created_by->avatar_url ) 
            //                         : false ,
            //                     'image' => strlen( $child->created_by->image ) > 0 && \Storage::disk('public')->exists( $child->created_by->image )
            //                         ? \Storage::disk('public')->url( $child->created_by->image ) 
            //                         : false
            //                 ] ,
            //             'status' => $child->status ,
            //             'pid' => $child->pid
            //         ];
            //     })
            //     : [] ;
            $task->children = $task->children != null && !$task->children->isEmpty() ? $task->getChildAsTree() : [] ;

            return $task ;
        });

        $responseData['ok'] = true;
        $responseData['message'] = __("crud.read.success");
        return response()->json($responseData, 200);
    }
    /** Create a new Archive */
    public function create(Request $request){
        $user = \Auth::user();
        if( $user == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមចូលប្រើប្រាស់ជាមុនសិន។'
            ],403);
        }        

        /**
         * Create a meeting under another meeting
         */
        $parent = intval( $request->pid ) > 0 ? RecordModel::find( $request->pid ) : null ;

        if (($record = RecordModel::create([
            'objective' => $request->objective ,
            'minutes' => $request->minutes ,
            'created_by' => $user->id ,
            'pid' => $parent != null && $parent->id > 0 ? $parent->id : 0 ,
            'tpid' => $parent != null && $parent->tpid > 0 ? $parent->tpid : 0
        ])) !== false) {
            /** Link the archive to the units */
            return response()->json([
                'record' => $record,
                'message' => __("crud.created.success")
            ], 200);
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.created.failed")
        ], 500);
    }
    /** Updating the archive */
    public function update(Request $request)
    {
        $user = \Auth::user();
        if( $user == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមចូលប្រើប្រាស់ជាមុនសិន។'
            ],403);
        }
        $record = RecordModel::find($request->id);
        if ( $record->update([
            'objective' => $request->objective ,
            'minutes' => $request->minutes ,
            'updated_by' => $user->id
        ]) ) {
            return response()->json([
                'ok' => true ,
                'record' => $record,
                'message' => __("crud.update.success")
            ], 200);
        }
        return response()->json([
            'ok' => false ,
            'record' => null,
            'message' => __("crud.update.failed")
        ], 201);
    }
    /** Updating the archive */
    public function read(Request $request)
    {
        if (($user = $request->user()) !== null) {
            $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
            // $crud->setRelationshipFunctions([
            //     'units' => false
            // ]);
            if (($record = $crud->read()) !== false) {
                $record = $crud->formatRecord($record);
                return response()->json([
                    'record' => $record,
                    'message' => __("crud.read.success")
                ], 200);
            }
            return response()->json([
                'record' => null,
                'message' => __("crud.read.failed")
            ], 201);
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    /** Reading an archive */
    public function delete(Request $request)
    {
        if (($user = $request->user()) !== null) {
            /** Merge variable created_by and updated_by into request */
            // $input = $request->input();
            // $input['updated_at'] = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            // $input['updated_by'] = $user->id;
            // $request->merge($input);

            $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
            if (($record = $crud->delete()) !== false) {
                /** Delete its structure and matras too */
                return response()->json([
                    'ok' => true ,
                    'record' => $record,
                    'message' => __("crud.delete.success")
                ], 200);
            }
            return response()->json([
                'ok' => false ,
                'record' => null,
                'message' => __("crud.delete.failed")
            ], 201);
        }
        return response()->json([
            'ok' => false ,
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    /** Upload file */
    public function upload(Request $request){
        if (($user = $request->user()) !== null) {
            $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
            $record = $crud->read();
            list($year,$month,$day) = explode('-', \Carbon\Carbon::parse( $record->year )->format('Y-m-d') );
            $path = $record->type_id."/".$year;
            if (($record = $crud->upload('pdfs',$path, new File($_FILES['files']['tmp_objective'][0]),$record->type_id.'-'.$year.$month.$day."-".$record->number.'.pdf' )) !== false) {
                // $record = $crud->formatRecord($record);
                return response()->json([
                    'record' => $record,
                    'message' => __("crud.delete.success")
                ], 200);
            }
            return response()->json([
                'record' => null,
                'message' => __("crud.delete.failed")
            ], 201);
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    /** Active the record */
    public function active(Request $request)
    {
        if (($user = $request->user()) !== null) {
            $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
            if ($crud->booleanField('active', $request->active )) {
                $record = $crud->formatRecord($record = $crud->read());
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'Activated !'
                    ],
                    200
                );
            } else {
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'There is not record matched !'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    /** Unactive the record */
    public function unactive(Request $request)
    {
        if (($user = $request->user()) !== null) {
            $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
            if ( $crud->booleanField('active', $request->active ) ) {
                // User does exists
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'Deactivated !'
                    ],
                    200
                );
            } else {
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'There is not record matched !'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    /**
     * Remove file
     */
    public function removefile(Request $request)
    {
        $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
        if (($record = $crud->removeFile('pdfs')) != null) {
            $record = $crud->formatRecord( $record );
            return response()->json([
                'record' => $record ,
                'message' => __('crud.remove.file.success')
            ], 200);
        }
        return response()->json([
            'message' => __('crud.remove.file.success')
        ], 350);
    }
    /** Mini display */
    public function forFilter(Request $request)
    {
        $crud = new CrudController(new RecordModel(), $request, $this->selectedFields);
        $responseData['records'] = $crud->getListBuilder()->where('active', 1)->limit(10)->get();;
        $responseData['message'] = __("crud.read.success");
        return response()->json($responseData, 200);
    }
    public function markAsNew(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់ដាក់ជាការងារថ្មី។'
                    ],
                    350
                );
            }
            if( $record->markAsNew() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'បានជោគជ័យ។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការដាក់ការងារជាការងារថ្មី។'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function start(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់ចាប់ផ្ដើម។'
                    ],
                    350
                );
            }
            if( $record->markAsStart() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'ការងារបានចាប់ផ្ដើមរួចរាល់។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការចាប់ផ្ដើមការងារ។'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function continue(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់ដាក់ក្នុងការដំណើរការ។'
                    ],
                    350
                );
            }
            if( $record->markAsContinue() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'ដាក់ការងារបានជោគជ័យ'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការ ដាក់ការក្នុងការដំណើរការ'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function pending(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់ដាក់ពន្យាពេល។'
                    ],
                    350
                );
            }
            if( $record->markAsPending() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'ដាក់ពន្យាពេលការងាររួចរាល់។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការ ដាក់ពន្យាពេលការងារ'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function end(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់បញ្ចប់។'
                    ],
                    350
                );
            }
            if( $record->markAsEnd() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'បញ្ចាប់ការងារ។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការ បញ្ចប់ការងារ'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function cancel(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់បដិសេធ៍។'
                    ],
                    350
                );
            }
            if( $record->markAsCancel() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'បដិសេធ៍ការងារ។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការ បដិសេធ៍ការងារ។'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function close(Request $request){
        if (($user = $request->user()) !== null) {
            $record = RecordModel::find( $request->id );
            if( $record == null ){
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'សូមបញ្ជាក់លេខសម្គាល់របស់ការងារដែលអ្នកចង់បិទ។'
                    ],
                    350
                );
            }
            if( $record->markAsClosed() ){
                return response(
                    [
                        'ok' => true ,
                        'record' => $record,
                        'message' => 'បិទការងារ។'
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'ok' => false ,
                        'record' => null,
                        'message' => 'មានបញ្ហាក្នុងការ បិទការងារ។'
                    ],
                    350
                );
            }
        }
        return response()->json([
            'record' => null,
            'message' => __("crud.auth.failed")
        ], 401);
    }
    public function toggleAssignee(Request $request){
        $user = \Auth::user();
        if( $user == null ){
            return response()->json([
                'message' => 'សូមចូលប្រើប្រាស់ជាមុនសិន។'
            ],403);
        }
        if( intval( $request->task_id ) <= 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ចាក់លេខសម្គាល់ការងារ។'
            ],500);
        }
        $task = RecordModel::find( $request->task_id );
        if( $task == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'រកការងារមិនមានឡើយ។'
            ],500);
        }
        if( intval( $request->assignee_id ) <= 0 ){
            return response()->json([
                'ok' => false ,
                'message' => 'សូមបញ្ជាក់លេខសម្គាល់សមាជិក។'
            ],500);
        }
        $assignee = \App\Models\People\People::find( $request->assignee_id );
        if( $assignee == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'សមាជិកនេះមិនមានឡើយ។'
            ],500);
        }

        /**
         * Check the existen of the record with the same information
         */
        $taskAssignment = TaskAssignment::where([ 'task_id' => $task->id , 'assignee_id' => $assignee->id ])->first();
        if( $taskAssignment == null ){
            $assigneeInformation = [ 
                $assignee->id => [
                    'assignor_id' => $user->person->id ,
                    'completion_percentage' => 0 ,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                    'created_by' => $user->id ,
                    'updated_by' => $user->id
                ]
            ];
        }else{
            $assigneeInformation = [ 
                $assignee->id => [
                    'completion_percentage' => 0 ,
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
                    'updated_by' => $user->id
                ]
            ];
        }

        /**
         * Remove the members of the meeting
         */
        $result = $task->assignees()->toggle( $assigneeInformation );
        // foreach( $result['detached'] AS $index => $assigneeId ){
        //     /**
        //      * if There is something any class related to the assignments then work on it here
        //      */
            
        // }

        $task->assignees = $task->assignees->map(function( $assignee ){ 
            $assignee->image = $assignee->image != null && \Storage::disk('public')->exists( $assignee->image )
            ? \Storage::disk('public')->url( $assignee->image )
            : (
                $assignee->user->avatar_url != null && \Storage::disk('public')->exists( $assignee->user->avatar_url )
                ? \Storage::disk('public')->url( $assignee->user->avatar_url )
                : false
            );
            return $assignee; 
        });
        return response()->json([
            'record' => $task ,
            'ok' => true ,
            'message' => 'ជោគជ័យ។'
        ],200);
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
                $uniqeName = Storage::disk('public')->putFile( 'tasks/'.$user->id , new File( $_FILES['files']['tmp_name'] ) );
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
                $uniqeName = Storage::disk('task')->putFile( '' , new File( $_FILES['files']['tmp_name'] ) );
                $record->pdf = $uniqeName ;
                $record->save();
                if( Storage::disk('task')->exists( $record->pdf ) ){
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
            $pathPdf = storage_path('data') . '/tasks/' . $record->pdf ;
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
