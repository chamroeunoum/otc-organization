<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationStaffsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organization_staffs')->delete();
        
        \DB::table('organization_staffs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'organization_id' => 463,
                'user_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'organization_id' => 461,
                'user_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'organization_id' => 462,
                'user_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'organization_id' => 461,
                'user_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'organization_id' => 463,
                'user_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'organization_id' => 463,
                'user_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'organization_id' => 463,
                'user_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'organization_id' => 463,
                'user_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'organization_id' => 463,
                'user_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'organization_id' => 463,
                'user_id' => 30,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'organization_id' => 463,
                'user_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}