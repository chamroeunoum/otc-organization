<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Administrator',
                'guard_name' => 'api',
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'tag' => 'core_service',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Administrator',
                'guard_name' => 'api',
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'tag' => 'core_service',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Backend member',
                'guard_name' => 'api',
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'tag' => 'core_service',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Client',
                'guard_name' => 'api',
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'tag' => 'webapp',
            ),
        ));
        
        
    }
}