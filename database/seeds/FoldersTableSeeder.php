<?php

use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('folders')->delete();
        
        \DB::table('folders')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'ច្បាប់ស្ដីពីការបង្កើត ក្រសួង/ស្ថាប័ន្ថ',
                'user_id' => 4,
                'created_at' => '2018-03-21 14:11:28',
                'updated_at' => '2018-04-25 08:30:19',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'ច្បាប់ស្ដីពីការរៀបចំនិងប្រព្រឹត្តទៅនៃ ក្រសួង/ស្ថាប័ន',
                'user_id' => 4,
                'created_at' => '2018-04-25 08:32:08',
                'updated_at' => '2018-04-25 08:32:08',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}