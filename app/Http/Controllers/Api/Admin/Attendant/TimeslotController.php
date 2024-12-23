<?php

namespace App\Http\Controllers\Api\Admin\Attendant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\Attendant\Timeslot as RecordModel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class TimeslotController extends Controller
{
    private $model = null ;
    private $fields = [ 'id','title','start' , 'end' , 'effective_day' , 'active' , 'rest_duration' ] ;
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
        
        $queryString = [
            "where" => [
                // 'default' => [
                //     [
                //         'field' => 'model' ,
                //         'value' => ''
                //     ]
                // ],
            ] ,
            "pagination" => [
                'perPage' => $perPage,
                'page' => $page
            ],
            "search" => $search === false ? [] : [
                'value' => $search ,
                'fields' => [
                    'title'
                ]
            ],
            "order" => [
                'field' => 'title' ,
                'by' => 'asc'
            ],
        ];
        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->fields , false , [] );

        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
        ]);

        $builder = $crud->getListBuilder();
        $builder->whereNull( 'deleted_at' );
        $responseData = $crud->pagination(true , $builder );
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
            'title' => $request->title ,
            'effective_day' => $request->effective_day ,
            'rest_duration' => $request->rest_duration ,
            'active' => 1 ,
            'start' => $request->start ,
            'end' => $request->end
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
            'title' => $request->title ,
            'effective_day' => $request->effective_day ,
            'rest_duration' => $request->rest_duration ,
            'start' => $request->start ,
            'end' => $request->end
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
}
