<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Log extends Model
{

    protected static $columns = [ 'user_id' , 'regulator_id' , 'datetime' ] ;
    public static function regulator($data=[]){
        $logDirectory = storage_path() . '/logs' ;
        $todayLog = 'regulator-'.\Carbon\Carbon::now()->format('Ymd').'.csv';
        $fields = [
            $data['user_id'] ,
            $data['regulator_id'] ,
            \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ];
        $handle = false ;
        if( !file_exists( $logDirectory . '/' . $todayLog ) ){
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
            fputcsv($handle, self::$columns , ',' );
        }else{
            $handle = fopen( $logDirectory . '/' . $todayLog , "a+"); 
        }
        fputcsv($handle, $fields);
        fclose($handle);
    }
    public static function getRegulator(){
        $logDirectory = storage_path() . '/logs' ;
        $todayLog = 'regulator-'.\Carbon\Carbon::now()->format('Ymd').'.csv';
        if( file_exists( $logDirectory . '/' . $todayLog ) ){
            $row = 1;
            if (($handle = fopen( $logDirectory . '/' . $todayLog , "r")) !== FALSE) {
                
                while(! feof($handle)){
                    print_r(fgetcsv($handle));
                }
                fclose($handle);

                // while (($data = fgetcsv($handle, 50 , ",")) !== FALSE) {
                //     $num = count($data);
                //     echo "<p> $num fields in line $row: <br /></p>\n";
                //     $row++;
                //     for ($c=0; $c < $num; $c++) {
                //         echo $data[$c] . "<br />\n";
                //     }
                // }
                // fclose($handle);
            }
        }
    }
}
