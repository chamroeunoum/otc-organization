<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Log extends Model
{
    protected const COLUMNS = [ 
        'regulator' => [
            'system', 'user_id' , 'regulator_id' , 'datetime' , 'remote_addr' , 'request_time_float'
        ],
        'matra' => [
            'system', 'user_id' , 'matra_id' , 'datetime' , 'remote_addr' , 'request_time_float'
        ],
        'access' => [
            'system', 'user_id' , 'class' , 'func' , 'desp' , 'datetime' , 'http_origin' , 'http_sec_ch_ua_mobile' , 'http_sec_ch_ua_platform' , 'http_user_agent' , 'http_x_forwarded_for' , 'request_uri' , 'query_string' , 'remote_addr' , 'request_time_float'
        ]
    ] ;
    public static function access($data=[]){
        $logDirectory = storage_path() . '/logs/access' ;
        $todayLog = \Carbon\Carbon::now()->format('Ymd').'.csv';
        $fields = [
            $data['system'] ,
            $data['user_id'] ,
            $data['class'] ,
            $data['func'] ,
            $data['desp'] ,
            \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
            isset( $_SERVER['HTTP_ORIGIN'] ) ? $_SERVER['HTTP_ORIGIN'] : "" ,
            isset( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) ? $_SERVER['HTTP_SEC_CH_UA_MOBILE'] : "" ,
            isset( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ? $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] : "" ,
            isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : "" ,
            isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : "" ,
            isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : "" ,
            isset( $_SERVER['QUERY_STRING'] ) ? $_SERVER['QUERY_STRING'] : "" ,
            isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : "" ,
            isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : ""
        ];
        $handle = false ;
        if( !file_exists( $logDirectory . '/' . $todayLog ) ){
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
            fputcsv($handle, self::COLUMNS['access'] , ',' );
        }else{
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
        }
        fputcsv($handle, $fields);
        fclose($handle);
    }
    public static function readAccess( $date = false , $page=1, $perPage=10){
        $date = $date == false ? \Carbon\Carbon::now() : \Carbon\Carbon::parse( $date );
        $page = intval( $page ) > 0 ? $page : 1 ;
        $perPage = intval( $perPage ) > 0 ? $perPage : 10 ;

        $logDirectory = storage_path() . '/logs/access' ;
        $todayLog = $date->format('Ymd').'.csv';
        $handle = false ;

        if( file_exists( $logDirectory . '/' . $todayLog ) ){
            $rows = collect([]) ;
            if (($handle = fopen( $logDirectory . '/' . $todayLog , "r")) !== FALSE) {
                $rowIndex = $dataIndex = 0 ;
                while (($data = fgetcsv( $handle , 1000 , ",")) !== FALSE) {
                    if( ( $numberOfColumns = count($data) ) > 0 && $rowIndex < $perPage ){
                        $rows->push( array_combine( self::COLUMNS['access'] , $data ) );
                        $rowIndex++;
                    }
                    $dataIndex++;
                }
                fclose($handle);
            }
            return $rows ;
        }
        return [] ;
    }
    /** 
     * Regulators
     */
    public static function matra($data=[]){
        $logDirectory = storage_path() . '/logs/matras' ;
        $todayLog = \Carbon\Carbon::now()->format('Ymd').'.csv';
        $fields = [
            $data['system'] ,
            $data['user_id'] ,
            $data['matra_id'] ,
            \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : "" ,
            isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : ""
        ];
        $handle = false ;
        if( !file_exists( $logDirectory . '/' . $todayLog ) ){
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
            fputcsv($handle, self::COLUMNS['matra'] , ',' );
        }else{
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
        }
        fputcsv($handle, $fields);
        fclose($handle);
    }
    public static function readMatra( $date = false , $page=1, $perPage=10){
        $date = $date == false ? \Carbon\Carbon::now() : \Carbon\Carbon::parse( $date );
        $page = intval( $page ) > 0 ? $page : 1 ;
        $perPage = intval( $perPage ) > 0 ? $perPage : 10 ;

        $logDirectory = storage_path() . '/logs/matras' ;
        $todayLog = $date->format('Ymd').'.csv';
        $handle = false ;

        if( file_exists( $logDirectory . '/' . $todayLog ) ){
            $rows = collect([]) ;
            if (($handle = fopen( $logDirectory . '/' . $todayLog , "r")) !== FALSE) {
                $rowIndex = $dataIndex = 0 ;
                while (($data = fgetcsv( $handle , 1000 , ",")) !== FALSE) {
                    if( ( $numberOfColumns = count($data) ) > 0 && $rowIndex < $perPage ){
                        $rows->push( array_combine( self::COLUMNS['matra'] , $data ) );
                        $rowIndex++;
                    }
                    $dataIndex++;
                }
                fclose($handle);
            }
            return $rows ;
        }
        return [] ;
    }

    /** 
     * Regulators
     */
    public static function regulator($data=[]){
        $logDirectory = storage_path() . '/logs/regulators' ;
        $todayLog = \Carbon\Carbon::now()->format('Ymd').'.csv';
        $fields = [
            $data['system'] ,
            $data['user_id'] ,
            $data['regulator_id'] ,
            \Carbon\Carbon::now()->format('Y-m-d H:i:s') ,
            isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : "" ,
            isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : ""
        ];
        $handle = false ;
        if( !file_exists( $logDirectory . '/' . $todayLog ) ){
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
            fputcsv($handle, self::COLUMNS['regulator'] , ',' );
        }else{
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
        }
        fputcsv($handle, $fields);
        fclose($handle);
    }

    public static function readRegulator( $date = false , $page=1, $perPage=10){
        $date = $date == false ? \Carbon\Carbon::now() : \Carbon\Carbon::parse( $date );
        $page = intval( $page ) > 0 ? $page : 1 ;
        $perPage = intval( $perPage ) > 0 ? $perPage : 10 ;

        $logDirectory = storage_path() . '/logs/regulators' ;
        $todayLog = $date->format('Ymd').'.csv';
        $handle = false ;

        if( file_exists( $logDirectory . '/' . $todayLog ) ){
            $rows = collect([]) ;
            if (($handle = fopen( $logDirectory . '/' . $todayLog , "r")) !== FALSE) {
                $rowIndex = $dataIndex = 0 ;
                while (($data = fgetcsv( $handle , 1000 , ",")) !== FALSE) {
                    if( ( $numberOfColumns = count($data) ) > 0 && $rowIndex < $perPage ){
                        $rows->push( array_combine( self::COLUMNS['regulator'] , $data ) );
                        $rowIndex++;
                    }
                    $dataIndex++;
                }
                fclose($handle);
            }
            return $rows ;
        }
        return [] ;
    }
}
