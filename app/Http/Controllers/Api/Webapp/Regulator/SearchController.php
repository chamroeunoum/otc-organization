<?php

namespace App\Http\Controllers\Api\Webapp\Regulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulator\Regulator as RecordModel;
use App\Http\Controllers\CrudController;


class SearchController extends Controller
{
    private $selectFields = [
        'id',
        'fid' ,
        'title' ,
        'objective',
        'year' ,
        'pdf' ,
        'publish' ,
        'created_by' ,
        'accessibility'
    ];
    /**
     * Listing function
     */
    public function index(Request $request){
        $user = \Auth::user() != null ? \Auth::user() : false ;

        /** Format from query string */
        $search = isset( $request->search ) && $request->serach !== "" ? $request->search : false ;
        $perPage = isset( $request->perPage ) && $request->perPage !== "" ? $request->perPage : 10 ;
        $page = isset( $request->page ) && $request->page !== "" ? $request->page : 1 ;
        
        $fid = isset( $request->fid ) && $request->fid != "" && $request->fid != null && $request->fid != 'null' ? $request->fid : false ;
        $year = isset( $request->year ) && $request->year != "" && $request->year != null && $request->year != 'null'  ? \Carbon\Carbon::parse( $request->year ) : false ;
        $types = isset( $request->types ) && $request->types != "" && $request->types != 'null' ? explode(',',$request->types) : false ;
        $signatures = isset( $request->signatures ) && $request->signatures != "" && $request->signatures != 'null' ? explode(',',$request->signatures) : false ;
        $organizations = isset( $request->organizations ) && $request->organizations != "" && $request->organizations != 'null' ? explode(',',$request->organizations) : false ;

        $queryString = [
            "where" => [
                'default' => [
                    [
                        'field' => 'active' ,
                        'value' => 1
                    ] ,
                    [
                        'field' => 'accessibility' ,
                        'value' => [ 4 ]
                    ]
                ],
                // 'in' => [
                //     [
                //         'field' => 'type' ,
                //         'value' => isset( $request->type ) && $request->type !== null ? [$request->type] : false
                //     ]
                // ] ,
                // 'not' => [
                //     [
                //         'field' => 'type' ,
                //         'value' => [4]
                //     ]
                // ] ,
                'like' => [
                    $year ? [
                        'field' => 'year' ,
                        'value' => $year->format('Y-m-d')
                    ] : [] 
                    ,
                    $fid ? [
                        'field' => 'fid' ,
                        'value' => $fid
                    ] : []
                ] ,
            ] ,
            "pivots" => [
                $types ?
                [
                    "relationship" => 'types',
                    "where" => [
                        "in" => [
                            "field" => "type_id",
                            "value" => $types
                        ]
                    ]
                ]
                : [] ,
                $signatures ?
                [
                    "relationship" => 'signatures',
                    "where" => [
                        "in" => [
                            "field" => "signature_id",
                            "value" => $signatures
                        ]
                    ]
                ]
                : [] ,
                $organizations ?
                [
                    "relationship" => 'organizations',
                    "where" => [
                        "in" => [
                            "field" => "organization_id",
                            "value" => $organizations
                        ]
                    ]
                ]
                : []
            ],
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
                'field' => 'id' ,
                'by' => 'desc'
            ],
        ];

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectFields,[
            /**
             * custom the value of the field
             */
            'pdf' => function($record){
                $record->pdf = is_array( $record->pdf ) && !empty( $record->pdf ) ?
                    (
                        array_map(function($file){ return (
                            \Storage::disk('regulator')->exists( $file ) ? str_replace(['/','.pdf','regulators','documents'],$file ) : false 
                        ); } , $record->pdf )
                    ) : 
                    (
                        $record->pdf != "" && $record->pdf != null 
                        ? ( 
                            \Storage::disk('regulator')->exists( $record->pdf ) ? str_replace(['/','.pdf','regulators','documents'],"",$record->pdf) : false 
                        )
                        : false
                    ) ;
                return $record->pdf ;
            },
           'objective' => function($record){
                return html_entity_decode( strip_tags( $record->objective ) );
            }
        ], false, false , 'regulators');
        /**
         * Set the storage driver name for CRUD
         */
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            'createdBy' => [ 'id' , 'firstname' , 'lastname' ] ,
            'types' => [ 'id' , 'name' ] ,
            'signatures' => [ 'id' , 'name' ] ,
            'organizations' => [ 'id' , 'name' ]
        ]);

        $builder = $crud->getListBuilder();

        $responseData = $crud->pagination(true, $builder);
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData, 200);
    }
    /**
     * Listing regulator by its type within a specific ministry
     */
    public function byTypeWithinOrganization($id){

        // Create Query Builder 
        $regulatorIds = \App\Models\Regulator\RegulatorOrganization::where('organization_id',$id)->first()->getRegulators();
        $queryBuilder = new Regulator();

        // Get search string
        if( $request->search != "" ){
            $searchTerms = explode(' ' , $request->search) ;
            if( is_array( $searchTerms ) && !empty( $searchTerms ) ){
                $queryBuilder = $queryBuilder -> where( function ($query ) use ( $searchTerms ) {
                    foreach( $searchTerms as $term ) {
                        $query = $query -> orwhere ( 'objective', 'LIKE' , "%".$term."%") ;
                    }
                } );
            }
        }
        // Get regulator type
        // if( $request->type != "" ){
        //     $regulatorTypes = explode(',', $request->type );
        //     if( is_array( $regulatorTypes ) && !empty( $regulatorTypes ) ){
        //         $queryBuilder = $queryBuilder -> where( function ($query ) use ( $regulatorTypes ) {
        //             foreach( $regulatorTypes as $type ) {
        //                 $query = $query -> orwhere ( 'regulator_type', $type ) ;
        //             }
        //         } );
        //     }
        // }
        // Get regulator year
        if( $request->year != "" ){
            $queryBuilder = $queryBuilder -> where('year','LIKE','%'.$request->year.'%');
        }
        // Get regulator registration id
        if( $request -> fid != "" ){
            $queryBuilder = $queryBuilder -> where('fid','LIKE','%'.$request -> fid);
        }

        $queryBuilder = $queryBuilder -> whereIn('id',$regulatorIds);
        // return $queryBuilder -> toSql();

        // $perpage = 
        return response([
            'records' => $queryBuilder->orderby('id','desc')->get()
                ->map( function ($record, $index) {
                    $record->objective = strip_tags( $record->objective ) ;
                    return $record ;
                })
            ,
            'message' => 'អានព័ត៌មាននៃគណនីបានរួចរាល់ !' 
        ],200 );
    }
    /**
     * View the pdf file
     */
    public function pdf(Request $request)
    {
        $regulatorId = isset( $request->id ) && intval( $request->id ) > 0 ? $request->id : false ;
        $regulatorSerial = isset( $request->serial ) && is_string( $request->serial ) ? $request->serial : false ;
        $regulator = $regulatorId 
            ? RecordModel::findOrFail($request->id) 
            : (
                $regulatorSerial 
                // ? RecordModel::where('pdf','like','%regulators/' . $regulatorSerial . '.pdf%')->first()
                ? RecordModel::where('pdf','like','%documents/' . $regulatorSerial . '.pdf%')->first()
                : false
            ) ;
        if( $regulator ) {
            /**
             * Check whether the regulator a public (accessibility = 2 ) or global type (accessibility = 4)
             */
            if( !in_array( $regulator->accessibility , [ 2, 4 ] ) ){
                return response()->json([
                    'ok' => false ,
                    'message' => 'មិនមានសិទ្ធិលើឯកសារ។'
                ],403);
            }
            /**
             * Check whether the pdf is array or string of regulator path
             */
            $path = '' ;
            if( $regulatorId !== false ){
                $path = storage_path('data') . '/' 
                . ( is_array( $regulator->pdf ) && !empty( $regulator->pdf ) ? $regulator->pdf[0] : '' ) 
                . ( is_string( $regulator->pdf ) ? $regulator->pdf : '' ) ;    
            }
            if( $regulatorSerial !== false ){
                $path = storage_path('data') . '/documents/' . $regulatorSerial . '.pdf' ;    
            }

            $ext = pathinfo($path);
            $filename = str_replace('/' , '-', $regulator->fid) . "." . $ext['extension'];
            
            /**   Log the access of the user */
            if( \Auth::user() !== null ){
                $current_date = date('Y-m-d H:i:s');
                DB::insert('insert into regulator_view_logs (user_id, regulator_id, date) values (?,?,?)', [\Auth::user()->id, $regulator->id, $current_date]);
            }

            if(is_file($path)) {
                $pdfBase64 = base64_encode( file_get_contents($path) );
                return response([
                    'serial' => $regulatorSerial ,
                    "pdf" => 'data:application/pdf;base64,' . $pdfBase64 ,
                    "filename" => $filename ,
                    "ok" => true
                ],200);
            }else
            {
                return response([
                    'message' => 'មានបញ្ហាក្នុងការអានឯកសារយោង !' ,
                    'path' => $path
                ],404 );
            }
        }else{
            return response([
                'message' => 'មិនមានឯកសារដែលស្វែងរក។' ,
                'ok' => false
            ],403 );
        }
    }
    /**
     * View the pdf file
     */
    public function sharedPdf(Request $request)
    {
        $regulatorSerial = isset( $request->serial ) && is_string( $request->serial ) ? $request->serial : false ;
        $regulator = $regulatorSerial 
            ? RecordModel::where('pdf','like','%regulators/' . $regulatorSerial . '.pdf%')->first()
            : false;
        if( $regulator ) {
            /**
             * Check whether the regulator a public (accessibility = 2 ) or global type (accessibility = 4)
             */
            if( $regulator->accessibility != 4 ){
                return response()->json([
                    'ok' => false ,
                    'message' => 'ឯកសារមិនមានឡើយ។'
                ],403);
            }
            /**
             * Check whether the pdf is array or string of regulator path
             */
            $path = '' ;
            if( $regulatorSerial !== false ){
                $path = storage_path('data') . '/regulators/' . $regulatorSerial . '.pdf' ;    
            }

            $ext = pathinfo($path);
            $filename = str_replace('/' , '-', $regulator->fid) . "." . $ext['extension'];
            
            /**   Log the access of the user */
            // if( \Auth::user() !== null ){
            //     $current_date = date('Y-m-d H:i:s');
            //     DB::insert('insert into regulator_view_logs (user_id, regulator_id, date) values (?,?,?)', [\Auth::user()->id, $regulator->id, $current_date]);
            // }

            if(is_file($path)) {
                $pdfBase64 = base64_encode( file_get_contents($path) );
                return response([
                    "pdf" => 'data:application/pdf;base64,' . $pdfBase64 ,
                    "filename" => $filename ,
                    "ok" => true
                ],200);
            }else
            {
                return response([
                    'message' => 'មានបញ្ហាក្នុងការអានឯកសារយោង !' ,
                    'path' => $path
                ],404 );
            }
        }else{
            return response([
                'message' => 'មិនមានឯកសារដែលស្វែងរក។' ,
                'ok' => false
            ],403 );
        }
    }
    /** Get the year(s) that there is/are regulators published base on ministry_id and regulator_type_id */
    public function getRegulatorsAsOrganizationTypeYearMonth(Request $request){
        $ministries = \App\Models\Organization()->selectRaw('id, name')->orderby('name','asc')->get();
        // $tree = []
        // foreach( $ministries as $ministryIndex => $ministry ){
            
        //     foreach( $ministry->regulators as $regulatorIndex => $regulator ){

        //     }
        // }    
    }

}
