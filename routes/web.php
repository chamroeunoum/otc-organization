<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\RegulatorController;
use App\Http\Controllers\Api\Admin\YPReaderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/oknha', [RegulatorController::class,'oknha'] );

Route::get('yp/categories', [YPReaderController::class,'byCategories'] );
Route::get('yp/categories/items', [YPReaderController::class,'byCategoriesItems'] );
Route::get('yp/custom',function(){
    echo "<table>";
    foreach( \App\Models\YPProvince::whereRaw('LENGTH(code) <= 2')->get() AS $index => $record ){
        echo "<tr>" ;
        echo "<td>" . $record->name_en . "</td>" ;
        echo "<td>" . $record->productOfProvince->count() . "</td>" ;
        echo "</tr>" ;
    }
    echo "</table>";

    echo "<table>";
    foreach( \App\Models\YPProvince::whereRaw('LENGTH(code) <= 4 && LENGTH(code) > 2')->get() AS $index => $record ){
        echo "<tr>" ;
        echo "<td>" . $record->name_en . "</td>" ;
        echo "<td>" . $record->productOfDistrictdistrict->count() . "</td>" ;
        echo "</tr>" ;
    }
    echo "</table>";

    echo "<table>" ;
    foreach( \App\Models\YPProvince::getDistrictsOfProvinceByCategory() AS $index => $province ){
        dd( $province );
        echo "<tr>";
        echo "<td  >".($index+1)."</td>";
        echo "<td colspan='3' >".$province['name']."</td>";
        echo "</tr>";
        foreach( $province['districts'] AS $dIndex => $district ){
            echo "<tr>";
            echo "<td>". ($index+1) . '.' .($dIndex+1)."</td>" ;
            echo "<td>". $district['name']."</td>";
            echo "<td>". $district['totalBusinesses']."</td>";
            echo "</tr>";
        }
        
    }
    echo "</table>";

    \App\Http\Controllers\Api\Admin\YPReaderController::savingDistrictToDatabase();
    
});
Route::get('yp/category/by/province',[YPReaderController::class,'businessesByCategoryOfProvince']);


Route::get('s3upload',function(){
    // dd( file_exists( storage_path() . "/app/public/avatars/1/7NovrdqakMv22LOricew910hDInkDbbYQSXdhtsv.jpg" ) );
    $filePath = storage_path() . "/app/public/avatars/1/7NovrdqakMv22LOricew910hDInkDbbYQSXdhtsv.jpg" ;
    if (function_exists('curl_file_create')) { // php 5.5+
        $cFile = curl_file_create( $filePath );
        $cFile->mime = mime_content_type( $filePath ) ;
        $cFile->postname = '7NovrdqakMv22LOricew910hDInkDbbYQSXdhtsv.jpg' ;

        $post = array(
            'path' => 'master-long/videos' ,
            'file'=> $cFile
        );
    
        libxml_use_internal_errors(true);
        $data = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, "https://stg.vi-school.com/api/s3-upload-file" );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    
        $headers = [
            'Accept: application/json',
            'Content-Type: multipart/form-data',
            'Aws-Access-Key: AKIA5HO7E24PCYLDXZ4X'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $data = curl_exec($ch);
        curl_close($ch);
        echo( $data );
    }
});