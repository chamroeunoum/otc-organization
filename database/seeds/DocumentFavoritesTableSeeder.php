<?php

use Illuminate\Database\Seeder;

class DocumentFavoritesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('document_favorites')->delete();
        
        \DB::table('document_favorites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'document_id' => 13227,
                'user_id' => 6,
                'created_at' => '2017-05-16 14:50:22',
                'updated_at' => '2017-05-16 14:50:22',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'document_id' => 13228,
                'user_id' => 6,
                'created_at' => '2017-05-17 00:19:18',
                'updated_at' => '2017-05-17 00:19:18',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 12,
                'document_id' => 46116,
                'user_id' => 16,
                'created_at' => '2018-03-19 08:45:44',
                'updated_at' => '2018-03-19 08:45:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 15,
                'document_id' => 46116,
                'user_id' => 4,
                'created_at' => '2018-03-21 14:27:40',
                'updated_at' => '2018-03-21 14:27:40',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 16,
                'document_id' => 46257,
                'user_id' => 4,
                'created_at' => '2018-03-27 15:57:23',
                'updated_at' => '2018-03-27 15:57:23',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 17,
                'document_id' => 46254,
                'user_id' => 4,
                'created_at' => '2018-03-27 15:57:24',
                'updated_at' => '2018-03-27 15:57:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}