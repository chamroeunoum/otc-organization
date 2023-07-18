<?php

namespace App\Http\Controllers\Api\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document as RecordModel;
use App\Http\Controllers\CrudController;


class SearchController extends Controller
{
    private $selectFields = [
        'id',
        'fid' ,
        'title' ,
        'objective',
        'document_year' ,
        'pdf' ,
        'document_type' ,
        'publish' ,
        'created_by' ,
        'accessibility'
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
            "where" => [
                'default' => [
                    [
                        'field' => 'active' ,
                        'value' => 1
                    ] ,
                    [
                        'field' => 'accessibility' ,
                        'value' => [ 2 , 4 ]
                    ]
                ],
                // 'in' => [
                //     [
                //         'field' => 'document_type' ,
                //         'value' => isset( $request->document_type ) && $request->document_type !== null ? [$request->document_type] : false
                //     ]
                // ] ,
                'not' => [
                    [
                        'field' => 'document_type' ,
                        'value' => [4]
                    ]
                ] ,
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
                    'objective', 'fid', 'document_year'
                ]
            ],
            "order" => [
                'field' => 'id' ,
                'by' => 'desc'
            ],
        ];
        if( isset( $request->document_type ) ) {
            $queryString['where']['default'] = [
                'in' => [
                    [
                        'field' => 'document_type' ,
                        'value' =>  $request->document_type
                    ]
                ]
            ];
        }

        $request->merge( $queryString );

        $crud = new CrudController(new RecordModel(), $request, $this->selectFields,[
            /**
             * custom the value of the field
             */
            'pdf' => function($record){
                $record->pdf = is_array( $record->pdf ) && !empty( $record->pdf ) ?
                    (
                        array_map(function($file){ return (
                            \Storage::disk('document')->exists( $file ) ? str_replace(['.pdf','documents/'],$file ) : false 
                        ); } , $record->pdf )
                    ) : 
                    (
                        $record->pdf != "" && $record->pdf != null 
                        ? ( 
                            \Storage::disk('document')->exists( $record->pdf ) ? str_replace(['.pdf','documents/'],"",$record->pdf) : false 
                        )
                        : false
                    ) ;
                return $record->pdf ;
            },
           'objective' => function($record){
                    return html_entity_decode( strip_tags( $record->objective ) );
                }
            ]);
        /**
         * Set the storage driver name for CRUD
         */
        $crud->setStorageDriver( 'document' );
        $crud->setRelationshipFunctions([
            /** relationship name => [ array of fields name to be selected ] */
            "type" => ['id', 'name', 'format', 'color', 'index'] ,
            "ministries" => ['id', 'name'] ,
            'createdBy' => [ 'id' , 'firstname' , 'lastname' ]
        ]);

        $builder = $crud->getListBuilder();

        $responseData = $crud->pagination(true, $builder);
        $responseData['message'] = __("crud.read.success");
        $responseData['ok'] = true ;
        return response()->json($responseData, 200);
    }
    /**
     * Listing document by its type within a specific ministry
     */
    public function byTypeWithinMinistry($id){

        // Create Query Builder 
        $documentIds = \App\Models\DocumentMinistry::where('ministry_id',$id)->first()->getDocuments();
        $queryBuilder = new Document();

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
        // Get document type
        if( $request->document_type != "" ){
            $documentTypes = explode(',', $request->document_type );
            if( is_array( $documentTypes ) && !empty( $documentTypes ) ){
                $queryBuilder = $queryBuilder -> where( function ($query ) use ( $documentTypes ) {
                    foreach( $documentTypes as $type ) {
                        $query = $query -> orwhere ( 'document_type', $type ) ;
                    }
                } );
            }
        }
        // Get document year
        if( $request->document_year != "" ){
            $queryBuilder = $queryBuilder -> where('document_year','LIKE','%'.$request->document_year.'%');
        }
        // Get document registration id
        if( $request -> fid != "" ){
            $queryBuilder = $queryBuilder -> where('fid','LIKE','%'.$request -> fid);
        }

        $queryBuilder = $queryBuilder -> whereIn('id',$documentIds);
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
        $documentId = isset( $request->id ) && intval( $request->id ) > 0 ? $request->id : false ;
        $documentSerial = isset( $request->serial ) && is_string( $request->serial ) ? $request->serial : false ;
        $document = $documentId 
            ? RecordModel::findOrFail($request->id) 
            : (
                $documentSerial 
                ? RecordModel::where('pdf','like','%documents/' . $documentSerial . '.pdf%')->first()
                : false
            ) ;
        if( $document ) {
            /**
             * Check whether the document a public (accessibility = 2 ) or global type (accessibility = 4)
             */
            if( !in_array( $document->accessibility , [ 2, 4 ] ) ){
                return response()->json([
                    'ok' => false ,
                    'message' => 'មិនមានសិទ្ធិលើឯកសារ។'
                ],403);
            }
            /**
             * Check whether the pdf is array or string of document path
             */
            $path = '' ;
            if( $documentId !== false ){
                $path = storage_path('data') . '/' 
                . ( is_array( $document->pdf ) && !empty( $document->pdf ) ? $document->pdf[0] : '' ) 
                . ( is_string( $document->pdf ) ? $document->pdf : '' ) ;    
            }
            if( $documentSerial !== false ){
                $path = storage_path('data') . '/documents/' . $documentSerial . '.pdf' ;    
            }

            $ext = pathinfo($path);
            $filename = str_replace('/' , '-', $document->fid) . "." . $ext['extension'];
            
            /**   Log the access of the user */
            if( \Auth::user() !== null ){
                $current_date = date('Y-m-d H:i:s');
                DB::insert('insert into document_view_logs (user_id, document_id, date) values (?,?,?)', [\Auth::user()->id, $document->id, $current_date]);
            }

            if(is_file($path)) {
                $pdfBase64 = base64_encode( file_get_contents($path) );
                return response([
                    'serial' => $documentSerial ,
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
        $documentSerial = isset( $request->serial ) && is_string( $request->serial ) ? $request->serial : false ;
        $document = $documentSerial 
            ? RecordModel::where('pdf','like','%documents/' . $documentSerial . '.pdf%')->first()
            : false;
        if( $document ) {
            /**
             * Check whether the document a public (accessibility = 2 ) or global type (accessibility = 4)
             */
            if( $document->accessibility != 4 ){
                return response()->json([
                    'ok' => false ,
                    'message' => 'ឯកសារមិនមានឡើយ។'
                ],403);
            }
            /**
             * Check whether the pdf is array or string of document path
             */
            $path = '' ;
            if( $documentSerial !== false ){
                $path = storage_path('data') . '/documents/' . $documentSerial . '.pdf' ;    
            }

            $ext = pathinfo($path);
            $filename = str_replace('/' , '-', $document->fid) . "." . $ext['extension'];
            
            /**   Log the access of the user */
            // if( \Auth::user() !== null ){
            //     $current_date = date('Y-m-d H:i:s');
            //     DB::insert('insert into document_view_logs (user_id, document_id, date) values (?,?,?)', [\Auth::user()->id, $document->id, $current_date]);
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
    /** Get the year(s) that there is/are documents published base on ministry_id and document_type_id */
    public function getDocumentsAsMinistryTypeYearMonth(Request $request){
        $ministries = \App\Models\Ministry()->selectRaw('id, name')->orderby('name','asc')->get();
        // $tree = []
        // foreach( $ministries as $ministryIndex => $ministry ){
            
        //     foreach( $ministry->documents as $documentIndex => $document ){

        //     }
        // }    
    }

}
