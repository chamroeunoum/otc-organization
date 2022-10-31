<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'contact_email',
                'name' => 'Contact form email address',
                'description' => 'The email address that all emails from the contact form will go to.',
                'value' => 'admin@updivision.com',
                'field' => '{"name":"value","label":"Value","type":"email"}',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'contact_cc',
                'name' => 'Contact form CC field',
                'description' => 'Email adresses separated by comma, to be included as CC in the email sent by the contact form.',
                'value' => '',
                'field' => '{"name":"value","label":"Value","type":"email"}',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'contact_bcc',
                'name' => 'Contact form BCC field',
                'description' => 'Email adresses separated by comma, to be included as BCC in the email sent by the contact form.',
                'value' => '',
                'field' => '{"name":"value","label":"Value","type":"email"}',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'motto',
                'name' => 'Motto',
                'description' => 'Website motto',
                'value' => 'this is the value',
                'field' => '{"name":"value","label":"Value", "title":"Motto value" ,"type":"textarea"}',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}