<?php

use Illuminate\Database\Seeder;

class PermissionUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_users')->delete();
        
        \DB::table('permission_users')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'permission_id' => 13,
            ),
            1 => 
            array (
                'user_id' => 1,
                'permission_id' => 14,
            ),
            2 => 
            array (
                'user_id' => 1,
                'permission_id' => 15,
            ),
            3 => 
            array (
                'user_id' => 1,
                'permission_id' => 16,
            ),
        ));
        
        
    }
}