<?php

namespace App\Http\Controllers\Api\Admin\Regulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\Regulator\Tag\Type as RecordModel;


class TypeController extends Controller
{
    private $model = null ;
    private $fields = [ 'id','name','desp' , 'pid' , 'record_index' ] ;
    public function __construct(){
        $this->model = new RecordModel();
    }
    /**
     * Listing function
     */
    public function index(Request $request){
        // $perpage = 
        return response([
            'records' => $this->model->children()->get(),
            'message' => 'អានព័ត៌មាននៃគណនីបានរួចរាល់ !' 
        ],200 );
    }
    /** Mini display */
    public function compact(Request $request)
    {
        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 1000 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        
        $id = isset( $request->id ) && intval( $request->id ) > 0? intval( $request->id ) : false ; // 163 គឺ រាជរដ្ឋាភិបាល

        $root = $id > 0 
            ? RecordModel::where('id',$id)->first()
            : RecordModel::where('model', get_class( $this->model ) )->first();
        if( $root == null ){
            return response()->json([
                'ok' => false ,
                'message' => 'ក្រសួងស្ថាប័ននេះមិនមានឡើយ។'
            ],422);
        }

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
            ],
        ];
        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->fields );

        $builder = $crud->getListBuilder();
        $responseData = $crud->pagination(true , $builder );

        // $responseData['records'] = $responseData['records']->prepend( $root );
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData);
    }

}
