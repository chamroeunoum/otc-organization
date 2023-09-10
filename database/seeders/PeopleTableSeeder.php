<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('people')->delete();
        
        \DB::table('people')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'Chamroeun',
                'lastname' => 'OUM',
                'gender' => 0,
                'dob' => '1984-03-18',
                'mobile_phone' => '012557200',
                'office_phone' => NULL,
                'email' => 'chamroeunoum@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'Puthireach',
                'lastname' => 'KONGCHAN',
                'gender' => 0,
                'dob' => '1984-03-18',
                'mobile_phone' => '010517515',
                'office_phone' => NULL,
                'email' => 'kongchanputhireach@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}