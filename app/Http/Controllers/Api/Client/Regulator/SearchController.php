<?php

namespace App\Http\Controllers\Api\Client\Regulator;

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
        $perPage = isset( $request->perPage ) && intval( $request->perPage ) > 0 ? $request->perPage : 10 ;
        $page = isset( $request->page ) && intval( $request->page ) > 0 ? $request->page : 1 ;
        
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
                $record->pdf = ( strlen( $record->pdf ) > 0 && \Storage::disk('regulator')->exists( str_replace( [ 'regulators/' , 'documents/' ] , '' , $record->pdf ) ) )
                ? true
                : false ;
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
        $regulatorSerial = isset( $request->serial ) && is_string( $request->serial ) && strlen( $request->serial ) > 0 ? $request->serial : false ;
        $regulator = $regulatorId 
            ? RecordModel::findOrFail($request->id) 
            : (
                $regulatorSerial 
                ? RecordModel::where('pdf','like','%' . $regulatorSerial . '.pdf%')->first()
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
                if( 
                    is_array( $regulator->pdf ) &&
                    !empty( $regulator->pdf )
                ){
                    foreach( $regulator->pdf AS $index => $pdfPath ){
                        if( strlen( $pdfPath ) > 0 && \Storage::disk('regulator')->exists( $pdfPath ) ){
                            $path = storage_path('data') . '/regulators/' . str_replace([ 'regulators/' ,'documents/' ],'', $pdfPath ) ;
                            break ;
                        }
                    }
                }
                else if( is_string( $regulator->pdf ) && strlen( $regulator->pdf ) > 0 && \Storage::disk('regulator')->exists( $regulator->pdf ) ){
                    $path = storage_path('data') . '/regulators/' . str_replace([ 'regulators/' ,'documents/' ],'', $regulator->pdf ) ;
                }
            }
            else if( $regulatorSerial !== false ){
                $path = storage_path('data') . '/regulators/' . $regulatorSerial . '.pdf' ;    
            }

            $ext = pathinfo($path);
            $filename = str_replace('/' , '-', $regulator->fid) . "." . isset( $ext['extension'] ) && strlen( $ext['extension'] ) > 0 ? $ext['extension'] : 'pdf' ;
            
            /**   Log the access of the user */
            if( \Auth::user() !== null ){
                \App\Models\Log\Log::regulator([
                    'user_id' => \Auth::user()->id ,
                    'regulator_id' => $regulator->id
                ]);
                // $current_date = date('Y-m-d H:i:s');
                // DB::insert('insert into regulator_view_logs (user_id, regulator_id, date) values (?,?,?)', [\Auth::user()->id, $regulator->id, $current_date]);
            }

            if(is_file($path)) {

                // Check whether the pdf has once applied the watermark
                if( !file_exists (storage_path('data') . '/watermarkfiles/' . $regulator->pdf ) ){
                    // Specify path to the existing pdf
                    $pdf = new Pdf( $pathPdf );

                    // Specify path to image. The image must have a 96 DPI resolution.
                    $watermark = new ImageWatermark( 
                        storage_path('data') . 
                        '/watermark5.png' 
                    );

                    // Create a new watermarker
                    $watermarker = new PDFWatermarker($pdf, $watermark); 

                    // Set the position of the watermark including optional X/Y offsets
                    // $position = new Position(Position::BOTTOM_CENTER, -50, -10);

                    // All possible positions can be found in Position::options
                    // $watermarker->setPosition($position);

                    // Place watermark behind original PDF content. Default behavior places it over the content.
                    // $watermarker->setAsBackground();


                    // Only Watermark specific range of pages
                    // This would only watermark page 3 and 4
                    // $watermarker->setPageRange(3, 4);
                    
                    // Save the new PDF to its specified location
                    $watermarker->save( storage_path('data') . '/watermarkfiles/' . $regulator->pdf );
                }   

                $pdfBase64 = base64_encode( 
                    file_get_contents( 
                        // $pathPdf 
                        storage_path('data') . '/watermarkfiles/' . $regulator->pdf
                    ) 
                );

                // $pdfBase64 = base64_encode( file_get_contents($path) );
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
            ? RecordModel::where('pdf','like','%' . $regulatorSerial . '.pdf%')->first()
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
                $path = storage_path('data') . '/documents/' . $regulatorSerial . '.pdf' ;    
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
