<?php

use Illuminate\Database\Seeder;

class PopmessageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('popmessage')->delete();
        
        \DB::table('popmessage')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'សារស្វាគមន៍',
                'description' => 'សូមស្វារគមន៍សម្រាប់ការចូលប្រើប្រាស់ ប្រព័ន្ធឯកសារច្បាប់ និង លិខិតបទដ្ឋានគតិយុត្ត !',
                'alert_type' => '1',
                'hidecheck' => '1',
            ),
        ));
        
        
    }
}