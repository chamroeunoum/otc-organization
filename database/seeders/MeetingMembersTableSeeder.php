<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeetingMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meeting_members')->delete();
        
        \DB::table('meeting_members')->insert(array (
            0 => 
            array (
                'id' => 1,
                'meeting_id' => 1,
                'people_id' => 27,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'meeting_id' => 1,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'meeting_id' => 2,
                'people_id' => 27,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'meeting_id' => 2,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'meeting_id' => 2,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'meeting_id' => 1,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'meeting_id' => 3,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 10,
                'meeting_id' => 3,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 11,
                'meeting_id' => 3,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 14,
                'meeting_id' => 4,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'meeting_id' => 4,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'meeting_id' => 4,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 15,
                'meeting_id' => 5,
                'people_id' => 30,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 16,
                'meeting_id' => 5,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 17,
                'meeting_id' => 6,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 18,
                'meeting_id' => 6,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'meeting_id' => 6,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 22,
                'meeting_id' => 7,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'meeting_id' => 7,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'meeting_id' => 7,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 25,
                'meeting_id' => 8,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'meeting_id' => 8,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'meeting_id' => 8,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 28,
                'meeting_id' => 9,
                'people_id' => 10,
                'role' => 'audient',
                'group' => 'member',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 26,
                'meeting_id' => 9,
                'people_id' => 29,
                'role' => 'lead_meeting',
                'group' => 'leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 27,
                'meeting_id' => 9,
                'people_id' => 28,
                'role' => 'lead_meeting',
                'group' => 'deputy_leader',
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}