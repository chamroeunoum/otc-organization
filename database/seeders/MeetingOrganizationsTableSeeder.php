<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeetingOrganizationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meeting_organizations')->delete();
        
        \DB::table('meeting_organizations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'organization_id' => 164,
                'meeting_id' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'organization_id' => 164,
                'meeting_id' => 2,
            ),
            2 => 
            array (
                'id' => 4,
                'organization_id' => 164,
                'meeting_id' => 3,
            ),
            3 => 
            array (
                'id' => 5,
                'organization_id' => 164,
                'meeting_id' => 4,
            ),
            4 => 
            array (
                'id' => 6,
                'organization_id' => 164,
                'meeting_id' => 6,
            ),
            5 => 
            array (
                'id' => 7,
                'organization_id' => 164,
                'meeting_id' => 7,
            ),
            6 => 
            array (
                'id' => 8,
                'organization_id' => 164,
                'meeting_id' => 8,
            ),
            7 => 
            array (
                'id' => 9,
                'organization_id' => 164,
                'meeting_id' => 9,
            ),
        ));
        
        
    }
}