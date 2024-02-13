<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeetingRoomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meeting_rooms')->delete();
        
        \DB::table('meeting_rooms')->insert(array (
            0 => 
            array (
                'id' => 4,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 1,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 2,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 3,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 4,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'organization_id' => 0,
                'meeting_id' => 550,
                'room_id' => 5,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 9,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 6,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 10,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 7,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 8,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 12,
                'organization_id' => 0,
                'meeting_id' => 560,
                'room_id' => 9,
                'remark' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}