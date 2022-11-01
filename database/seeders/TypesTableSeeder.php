<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ព្រះរាជក្រម',
                'format' => 'នស/រកម',
            'color' => 'rgba(217,204,149,0.8)',
                'document_index' => 1,
                'document_fields' => '1;2;4;9;3;6;7;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ព្រះរាជក្រឹត្យ.បក',
                'format' => 'នស/រកត',
            'color' => 'rgba(221,125,125,0.8)',
                'document_index' => 2,
                'document_fields' => '1;2;4;9;3;6;7;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'អនុក្រឹត្យ.បក',
                'format' => 'អនក្រ.បក',
            'color' => 'rgba(170,156,137,0.8)',
                'document_index' => 3,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ស.ជ.ណ',
                'format' => 'ស.ជ.ណ',
                'color' => '#000000',
                'document_index' => 4,
                'document_fields' => '1;6;4;9;2;3;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => '2018-03-19 16:25:30',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'សេចក្ដីសម្រេច',
                'format' => 'សសរ',
            'color' => 'rgba(140,243,149,0.8)',
                'document_index' => 5,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'សារាចរ និង សារាចរណែនាំ',
                'format' => 'សរ,សរណន',
            'color' => 'rgba(234,124,185,0.8)',
                'document_index' => 6,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'ប្រកាស',
                'format' => 'ប្រ.ក',
            'color' => 'rgba(129,158,209,0.8)',
                'document_index' => 7,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'គោលនយោបាយជាតិ',
                'format' => 'គនបជ',
            'color' => 'rgba(124,144,231,0.8)',
                'document_index' => 8,
                'document_fields' => '6;4;9;7;3;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'ផែនការយុទ្ធសាស្ត្រ',
                'format' => 'ផយស',
            'color' => 'rgba(148,158,252,0.8)',
                'document_index' => 9,
                'document_fields' => '2;4;9;7;6;3;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'បទបញ្ជារាជរដ្ឋាភិបាល',
                'format' => 'បប',
            'color' => 'rgba(200,143,239,0.8)',
                'document_index' => 10,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'ផែនការសកម្មភាពក្រសួងនានា',
                'format' => 'ផសក្រ',
            'color' => 'rgba(147,124,178,0.8)',
                'document_index' => 11,
                'document_fields' => '1;2;4;9;3;6;7;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'អនុក្រឹត្យ.តត',
                'format' => 'អនក្រ.តត',
            'color' => 'rgba(221,125,125,0.8)',
                'document_index' => 3,
                'document_fields' => '1;2;4;9;3;6;7;5;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'ព្រះរាជក្រឹត្យ.តត',
                'format' => 'នស/រកត',
            'color' => 'rgba(221,125,125,0.8)',
                'document_index' => 2,
                'document_fields' => '1;2;4;9;3;6;7;8',
                'created_by' => 0,
                'modified_by' => 0,
                'deleted_by' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}