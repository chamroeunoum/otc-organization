<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'chamroeunoum@gmail.com',
                'token' => '$2y$10$9K4iC4v3mAEzFPe//gGBd.hH5yfoS0EVjLR/0cPtylighscMx92G.',
                'created_at' => '2017-04-04 09:25:27',
            ),
        ));
        
        
    }
}