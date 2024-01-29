<?php

namespace App\Http\Controllers\Api\Meeting\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\Meeting\Room as RecordModel;


class RoomController extends Controller
{
    private $model = null ;
    private $fields = [ 'id','name','desp' , 'pid' , 'model' , 'tpid' , 'record_index'  ] ;
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
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 50 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        $id = intval( $request->id ) > 0 ? intval( $request->id ) : 547 ; // 164 ទីស្ដីការគៈណរដ្ឋនមន្ត្រី
        $root = $id > 0 
            ? RecordModel::where('id',$id)->first()
            : RecordModel::where('model', get_class( $this->model ) )->first();

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

        $crud = new CrudController(new RecordModel(), $request, $this->fields , false , $this->renameFields );
        $builder = $crud->getListBuilder();
        
        $builder = $builder->where('tpid', "LIKE" , ( intval( $root->pid ) > 0 ? $root->pid.":" : '' ) . $root->id . "%");
        $root->parentId = null ;

        $responseData = $crud->pagination(true , $builder );
        // $responseData['records'] = $responseData['records']->prepend( $root );
        $responseData['records'] = $responseData['records']->map(function($room){
            $objRoom = \App\Models\Meeting\Room::find( $room['id'] ) ;
            $room['meetingRooms'] = $objRoom != null ? (
                $objRoom->meetingRooms->map(function($room){
                    $room->meeting ;
                    $room->organization ;
                    return [
                        'id' => $room->id ,
                        'date' => $room->date ,
                        'start' => $room->start ,
                        'end' => $room->end ,
                        'remark' => $room->remark ,
                        'meeting' => $room->meeting != null ? [
                            'id' => $room->meeting->id ,
                            'date' => $room->meeting->date ,
                            'objective' => $room->meeting->objective ,
                            'start' => $room->meeting->start ,
                            'end' => $room->meeting->end
                        ] : null ,
                        'organization' => $room->organization != null ? [
                            'id' => $room->organization->id ,
                            'name' => $room->organization->name ,
                            'desp' => $room->organization->desp
                        ] : null
                    ];
                }) 
            ): [] ;
            return $room;
        });
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
        $queryString = [
            "where" => [
                // 'default' => [
                //     [
                //         'field' => 'model' ,
                //         'value' => ''
                //     ],
                // ],
                // 'in' => [] ,
                // 'not' => [
                //     [
                //         'field' => 'id' ,
                //         'value' => 4
                //     ]
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
        $responseData = $crud->pagination(true, $this->model->children()->orderby('record_index','asc') );
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData);
    }
    /**
     * Create an account
     */
    public function store(Request $request){
        // អ្នកប្រើប្រាស់ មិនទាន់មាននៅឡើយទេ
        $record = RecordModel::create([
            'name' => $request->name,
            'desp' => $request->desp ,
            'image' => $request->image ,
            'pid' => null ,
            'tpid' => null
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
        if( $parent == null ){
            return response()->json([
                'ok' => false ,
                'message' => "សូមជ្រើសរើសមេជាមុនសិន។"
            ],350);
        }
        /**
         * In case the child that is going to be added is the child of the govenment
         */
        $root = null ;
        if( $parent->tpid == null || $parent->tpid <=0 ){
            $root = RecordModel::where('model', get_class( new RecordModel ) )->first();
        }
        // អ្នកប្រើប្រាស់ មិនទាន់មាននៅឡើយទេ
        $record = new RecordModel();
        $record->name = $request->name ;
        $record->desp = $request->desp;
        $record->image = '' ;
        $record->pid = $parent->id ;
        $record->save();
        // $record = RecordModel::create([
        //     'name' => $request->name,
        //     'desp' => $request->desp ,
        //     'image' => $request->image ,
        //     'pid' => $parent->id ,
        //     'tpid' => ''
        // ]);
        $record->tpid = ( $parent->tpid != "" ? $parent->tpid : $parent->pid ).":".$parent->id;
        $record->save();

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
     * Create an account
     */
    public function update(Request $request){
        $record = isset( $request->id ) && $request->id > 0 ? RecordModel::find($request->id) : false ;
        if( $record ) {
            $updateData = [
                'name' => $request->name ,
                'desp' => $request->desp ,
                'image' => $request->image
            ];
            intval( $request->pid ) > 0
                ? $updateData['pid'] = $request->pid
                : false ;
            $record->update( $updateData );
            return response()->json([
                'record' => $record ,
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
     * Unactive function of the account
     */
    public function unactive(Request $request){
        $user = RecordModel::find($request->id) ;
        if( $user ){
            $user->active = 0 ;
            $user->save();
            // User does exists
            return response([
                'ok' => true ,
                'user' => $user ,
                'message' => 'គណនី '.$user->name.' បានបិទដោយជោគជ័យ !' 
                ],
                200
            );
        }else{
            // User does not exists
            return response([
                'user' => null ,
                'ok' => false ,
                'message' => 'សូមទោស គណនីនេះមិនមានទេ !' ],
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
}
