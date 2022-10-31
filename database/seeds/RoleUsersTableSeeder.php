<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_users')->delete();
        
        \DB::table('role_users')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 1,
                'user_id' => 3,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 1,
                'user_id' => 5,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 1,
                'user_id' => 6,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            4 => 
            array (
                'role_id' => 1,
                'user_id' => 7,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            5 => 
            array (
                'role_id' => 5,
                'user_id' => 2,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            6 => 
            array (
                'role_id' => 5,
                'user_id' => 4,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            7 => 
            array (
                'role_id' => 5,
                'user_id' => 8,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            8 => 
            array (
                'role_id' => 5,
                'user_id' => 9,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            9 => 
            array (
                'role_id' => 5,
                'user_id' => 10,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            10 => 
            array (
                'role_id' => 5,
                'user_id' => 11,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            11 => 
            array (
                'role_id' => 5,
                'user_id' => 12,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            12 => 
            array (
                'role_id' => 5,
                'user_id' => 13,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            13 => 
            array (
                'role_id' => 5,
                'user_id' => 14,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            14 => 
            array (
                'role_id' => 5,
                'user_id' => 15,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            15 => 
            array (
                'role_id' => 5,
                'user_id' => 16,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
            16 => 
            array (
                'role_id' => 5,
                'user_id' => 17,
                'is_accpted' => NULL,
                'accpted_at' => NULL,
            ),
        ));
        
        
    }
}