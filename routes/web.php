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
Route::get('/oknha', [RegulatorController::class,'oknha'] );

Route::get('yp/categories', [YPReaderController::class,'byCategories'] );
Route::get('yp/categories/items', [YPReaderController::class,'byCategoriesItems'] );
Route::get('yp/custom',function(){
    // echo "<table>";
    // foreach( \App\Models\YPProvince::whereRaw('LENGTH(code) <= 2')->get() AS $index => $record ){
    //     echo "<tr>" ;
    //     echo "<td>" . $record->name_en . "</td>" ;
    //     echo "<td>" . $record->productOfProvince->count() . "</td>" ;
    //     echo "</tr>" ;
    // }
    // echo "</table>";

    // echo "<table>";
    // foreach( \App\Models\YPProvince::whereRaw('LENGTH(code) <= 4 && LENGTH(code) > 2')->get() AS $index => $record ){
    //     echo "<tr>" ;
    //     echo "<td>" . $record->name_en . "</td>" ;
    //     echo "<td>" . $record->productOfDistrictdistrict->count() . "</td>" ;
    //     echo "</tr>" ;
    // }
    // echo "</table>";

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