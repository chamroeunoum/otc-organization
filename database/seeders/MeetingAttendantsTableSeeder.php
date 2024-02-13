<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeetingAttendantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meeting_attendants')->delete();
        
        \DB::table('meeting_attendants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'meeting_member_id' => 1,
                'people_id' => 27,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:04:09',
                'updated_at' => '2024-01-31 10:04:09',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'meeting_member_id' => 2,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:04:11',
                'updated_at' => '2024-01-31 10:04:11',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'meeting_member_id' => 3,
                'people_id' => 9,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:04:13',
                'updated_at' => '2024-01-31 10:04:13',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            3 => 
            array (
                'id' => 5,
                'meeting_member_id' => 5,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:16:00',
                'updated_at' => '2024-01-31 10:16:00',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            4 => 
            array (
                'id' => 6,
                'meeting_member_id' => 4,
                'people_id' => 27,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:16:02',
                'updated_at' => '2024-01-31 10:16:02',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            5 => 
            array (
                'id' => 7,
                'meeting_member_id' => 7,
                'people_id' => 9,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:18:49',
                'updated_at' => '2024-01-31 10:18:49',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            6 => 
            array (
                'id' => 8,
                'meeting_member_id' => 8,
                'people_id' => 9,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:19:08',
                'updated_at' => '2024-01-31 10:19:08',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            7 => 
            array (
                'id' => 9,
                'meeting_member_id' => 9,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:24:07',
                'updated_at' => '2024-01-31 10:24:07',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            8 => 
            array (
                'id' => 10,
                'meeting_member_id' => 10,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:24:18',
                'updated_at' => '2024-01-31 10:24:18',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            9 => 
            array (
                'id' => 13,
                'meeting_member_id' => 12,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:26:35',
                'updated_at' => '2024-01-31 10:26:35',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            10 => 
            array (
                'id' => 14,
                'meeting_member_id' => 13,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:26:37',
                'updated_at' => '2024-01-31 10:26:37',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            11 => 
            array (
                'id' => 15,
                'meeting_member_id' => 15,
                'people_id' => 30,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:37:50',
                'updated_at' => '2024-01-31 10:37:50',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            12 => 
            array (
                'id' => 16,
                'meeting_member_id' => 16,
                'people_id' => 10,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:37:52',
                'updated_at' => '2024-01-31 10:37:52',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            13 => 
            array (
                'id' => 12,
                'meeting_member_id' => 14,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => '2024-01-31 10:47',
                'created_at' => '2024-01-31 10:26:33',
                'updated_at' => '2024-01-31 10:47:15',
                'deleted_at' => NULL,
                'created_by' => 1,
                'updated_by' => 1,
            ),
            14 => 
            array (
                'id' => 11,
                'meeting_member_id' => 11,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => '2024-01-31 10:47',
                'created_at' => '2024-01-31 10:24:31',
                'updated_at' => '2024-01-31 10:47:31',
                'deleted_at' => NULL,
                'created_by' => 1,
                'updated_by' => 1,
            ),
            15 => 
            array (
                'id' => 17,
                'meeting_member_id' => 19,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:51:24',
                'updated_at' => '2024-01-31 10:51:24',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            16 => 
            array (
                'id' => 18,
                'meeting_member_id' => 18,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:51:26',
                'updated_at' => '2024-01-31 10:51:26',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            17 => 
            array (
                'id' => 19,
                'meeting_member_id' => 17,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:51:28',
                'updated_at' => '2024-01-31 10:51:28',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            18 => 
            array (
                'id' => 20,
                'meeting_member_id' => 22,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:52:50',
                'updated_at' => '2024-01-31 10:52:50',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            19 => 
            array (
                'id' => 21,
                'meeting_member_id' => 20,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:52:53',
                'updated_at' => '2024-01-31 10:52:53',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            20 => 
            array (
                'id' => 22,
                'meeting_member_id' => 21,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:52:55',
                'updated_at' => '2024-01-31 10:52:55',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            21 => 
            array (
                'id' => 23,
                'meeting_member_id' => 23,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:55:44',
                'updated_at' => '2024-01-31 10:55:44',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            22 => 
            array (
                'id' => 24,
                'meeting_member_id' => 24,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:55:46',
                'updated_at' => '2024-01-31 10:55:46',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            23 => 
            array (
                'id' => 25,
                'meeting_member_id' => 25,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:55:52',
                'updated_at' => '2024-01-31 10:55:52',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            24 => 
            array (
                'id' => 26,
                'meeting_member_id' => 27,
                'people_id' => 28,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:56:55',
                'updated_at' => '2024-01-31 10:56:55',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            25 => 
            array (
                'id' => 27,
                'meeting_member_id' => 26,
                'people_id' => 29,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:56:57',
                'updated_at' => '2024-01-31 10:56:57',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
            26 => 
            array (
                'id' => 28,
                'meeting_member_id' => 28,
                'people_id' => 13,
                'remark' => NULL,
                'checktime' => NULL,
                'created_at' => '2024-01-31 10:57:01',
                'updated_at' => '2024-01-31 10:57:01',
                'deleted_at' => NULL,
                'created_by' => 0,
                'updated_by' => 0,
            ),
        ));
        
        
    }
}