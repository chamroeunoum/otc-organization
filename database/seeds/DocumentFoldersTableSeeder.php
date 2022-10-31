<?php

use Illuminate\Database\Seeder;

class DocumentFoldersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('document_folders')->delete();
        
        \DB::table('document_folders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'document_id' => 2,
                'folder_id' => 2,
                'created_at' => '2017-08-09 08:40:22',
                'updated_at' => '2017-08-09 08:40:22',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'document_id' => 46017,
                'folder_id' => 3,
                'created_at' => '2017-11-07 08:49:07',
                'updated_at' => '2017-11-07 08:49:07',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'document_id' => 46015,
                'folder_id' => 3,
                'created_at' => '2017-11-07 08:49:12',
                'updated_at' => '2017-11-07 08:49:12',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'document_id' => 46012,
                'folder_id' => 1,
                'created_at' => '2017-11-07 08:49:17',
                'updated_at' => '2017-11-07 08:49:17',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'document_id' => 46011,
                'folder_id' => 1,
                'created_at' => '2017-11-07 08:49:34',
                'updated_at' => '2017-11-07 08:49:34',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'document_id' => 13266,
                'folder_id' => 4,
                'created_at' => '2017-11-28 09:27:05',
                'updated_at' => '2017-11-28 09:27:05',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'document_id' => 16945,
                'folder_id' => 4,
                'created_at' => '2017-11-28 09:27:07',
                'updated_at' => '2017-11-28 09:27:07',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'document_id' => 16968,
                'folder_id' => 4,
                'created_at' => '2017-11-28 09:27:10',
                'updated_at' => '2018-03-16 09:49:43',
                'deleted_at' => NULL,
                'is_deleted' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'document_id' => 46072,
                'folder_id' => 3,
                'created_at' => '2018-01-17 10:06:40',
                'updated_at' => '2018-01-17 10:06:40',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'document_id' => 20269,
                'folder_id' => 1,
                'created_at' => '2018-03-16 09:36:18',
                'updated_at' => '2018-03-16 09:36:18',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'document_id' => 46105,
                'folder_id' => 5,
                'created_at' => '2018-03-19 03:23:00',
                'updated_at' => '2018-03-19 03:23:00',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'document_id' => 19555,
                'folder_id' => 6,
                'created_at' => '2018-03-20 09:25:41',
                'updated_at' => '2018-03-20 09:25:41',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'document_id' => 16516,
                'folder_id' => 6,
                'created_at' => '2018-03-20 09:25:49',
                'updated_at' => '2018-03-20 09:25:49',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'document_id' => 45781,
                'folder_id' => 6,
                'created_at' => '2018-03-20 10:09:52',
                'updated_at' => '2018-03-20 10:09:52',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'document_id' => 46115,
                'folder_id' => 7,
                'created_at' => '2018-03-21 02:18:35',
                'updated_at' => '2018-04-25 08:30:27',
                'deleted_at' => NULL,
                'is_deleted' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'document_id' => 18671,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:27:48',
                'updated_at' => '2018-04-25 08:27:48',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'document_id' => 18672,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:27:51',
                'updated_at' => '2018-04-25 08:27:51',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'document_id' => 18673,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:27:54',
                'updated_at' => '2018-04-25 08:27:54',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'document_id' => 13343,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:27:57',
                'updated_at' => '2018-04-25 08:27:57',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'document_id' => 13346,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:01',
                'updated_at' => '2018-04-25 08:28:01',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'document_id' => 13350,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:06',
                'updated_at' => '2018-04-25 08:28:06',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'document_id' => 17797,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:10',
                'updated_at' => '2018-04-25 08:28:10',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'document_id' => 17794,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:15',
                'updated_at' => '2018-04-25 08:28:15',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'document_id' => 17795,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:17',
                'updated_at' => '2018-04-25 08:28:17',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'document_id' => 17791,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:25',
                'updated_at' => '2018-04-25 08:28:25',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'document_id' => 17792,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:33',
                'updated_at' => '2018-04-25 08:28:33',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'document_id' => 17742,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:36',
                'updated_at' => '2018-04-25 08:28:36',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'document_id' => 17743,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:39',
                'updated_at' => '2018-04-25 08:28:39',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'document_id' => 17744,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:43',
                'updated_at' => '2018-04-25 08:28:43',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'document_id' => 17745,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:46',
                'updated_at' => '2018-04-25 08:28:46',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            30 => 
            array (
                'id' => 31,
                'document_id' => 17746,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:49',
                'updated_at' => '2018-04-25 08:28:49',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            31 => 
            array (
                'id' => 32,
                'document_id' => 17747,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:52',
                'updated_at' => '2018-04-25 08:28:52',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            32 => 
            array (
                'id' => 33,
                'document_id' => 17748,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:28:56',
                'updated_at' => '2018-04-25 08:28:56',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            33 => 
            array (
                'id' => 34,
                'document_id' => 17749,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:01',
                'updated_at' => '2018-04-25 08:29:01',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            34 => 
            array (
                'id' => 35,
                'document_id' => 17751,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:04',
                'updated_at' => '2018-04-25 08:29:04',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            35 => 
            array (
                'id' => 36,
                'document_id' => 17752,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:12',
                'updated_at' => '2018-04-25 08:29:12',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            36 => 
            array (
                'id' => 37,
                'document_id' => 17753,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:15',
                'updated_at' => '2018-04-25 08:29:15',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            37 => 
            array (
                'id' => 38,
                'document_id' => 17754,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:17',
                'updated_at' => '2018-04-25 08:29:17',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            38 => 
            array (
                'id' => 39,
                'document_id' => 17755,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:20',
                'updated_at' => '2018-04-25 08:29:20',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            39 => 
            array (
                'id' => 40,
                'document_id' => 17756,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:23',
                'updated_at' => '2018-04-25 08:29:23',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            40 => 
            array (
                'id' => 41,
                'document_id' => 17766,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:30',
                'updated_at' => '2018-04-25 08:29:30',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            41 => 
            array (
                'id' => 42,
                'document_id' => 17767,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:33',
                'updated_at' => '2018-04-25 08:29:33',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            42 => 
            array (
                'id' => 43,
                'document_id' => 17768,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:36',
                'updated_at' => '2018-04-25 08:29:36',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            43 => 
            array (
                'id' => 44,
                'document_id' => 17769,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:39',
                'updated_at' => '2018-04-25 08:29:39',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            44 => 
            array (
                'id' => 45,
                'document_id' => 17770,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:44',
                'updated_at' => '2018-04-25 08:29:44',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            45 => 
            array (
                'id' => 46,
                'document_id' => 17771,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:50',
                'updated_at' => '2018-04-25 08:29:50',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            46 => 
            array (
                'id' => 47,
                'document_id' => 17772,
                'folder_id' => 7,
                'created_at' => '2018-04-25 08:29:54',
                'updated_at' => '2018-04-25 08:29:54',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            47 => 
            array (
                'id' => 48,
                'document_id' => 17706,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:32:21',
                'updated_at' => '2018-04-25 08:32:21',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            48 => 
            array (
                'id' => 49,
                'document_id' => 17223,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:32:26',
                'updated_at' => '2018-04-25 08:32:26',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            49 => 
            array (
                'id' => 50,
                'document_id' => 46594,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:32:35',
                'updated_at' => '2018-04-25 08:32:35',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            50 => 
            array (
                'id' => 51,
                'document_id' => 18540,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:32:42',
                'updated_at' => '2018-04-25 08:32:42',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            51 => 
            array (
                'id' => 52,
                'document_id' => 18563,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:32:50',
                'updated_at' => '2018-04-25 08:32:50',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            52 => 
            array (
                'id' => 53,
                'document_id' => 46586,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:03',
                'updated_at' => '2018-04-25 08:33:03',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            53 => 
            array (
                'id' => 54,
                'document_id' => 15885,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:29',
                'updated_at' => '2018-04-25 08:33:29',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            54 => 
            array (
                'id' => 55,
                'document_id' => 45837,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:37',
                'updated_at' => '2018-04-25 08:33:37',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            55 => 
            array (
                'id' => 56,
                'document_id' => 46609,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:43',
                'updated_at' => '2018-04-25 08:33:43',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            56 => 
            array (
                'id' => 57,
                'document_id' => 46356,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:48',
                'updated_at' => '2018-04-25 08:33:48',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            57 => 
            array (
                'id' => 58,
                'document_id' => 46359,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:33:55',
                'updated_at' => '2018-04-25 08:33:55',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            58 => 
            array (
                'id' => 59,
                'document_id' => 45339,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:03',
                'updated_at' => '2018-04-25 08:34:03',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            59 => 
            array (
                'id' => 60,
                'document_id' => 46369,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:12',
                'updated_at' => '2018-04-25 08:34:12',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            60 => 
            array (
                'id' => 61,
                'document_id' => 17202,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:19',
                'updated_at' => '2018-04-25 08:34:19',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            61 => 
            array (
                'id' => 62,
                'document_id' => 46398,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:25',
                'updated_at' => '2018-04-25 08:34:25',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            62 => 
            array (
                'id' => 63,
                'document_id' => 46418,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:34',
                'updated_at' => '2018-04-25 08:34:34',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            63 => 
            array (
                'id' => 64,
                'document_id' => 46428,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:39',
                'updated_at' => '2018-04-25 08:34:39',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            64 => 
            array (
                'id' => 65,
                'document_id' => 45668,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:44',
                'updated_at' => '2018-04-25 08:34:44',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            65 => 
            array (
                'id' => 66,
                'document_id' => 46448,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:49',
                'updated_at' => '2018-04-25 08:34:49',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            66 => 
            array (
                'id' => 67,
                'document_id' => 18305,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:34:55',
                'updated_at' => '2018-04-25 08:34:55',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            67 => 
            array (
                'id' => 68,
                'document_id' => 46485,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:00',
                'updated_at' => '2018-04-25 08:35:00',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            68 => 
            array (
                'id' => 69,
                'document_id' => 45977,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:09',
                'updated_at' => '2018-04-25 08:35:09',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            69 => 
            array (
                'id' => 70,
                'document_id' => 45982,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:14',
                'updated_at' => '2018-04-25 08:35:14',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            70 => 
            array (
                'id' => 71,
                'document_id' => 18384,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:23',
                'updated_at' => '2018-04-25 08:35:23',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            71 => 
            array (
                'id' => 72,
                'document_id' => 17873,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:30',
                'updated_at' => '2018-04-25 08:35:30',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            72 => 
            array (
                'id' => 73,
                'document_id' => 17114,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:34',
                'updated_at' => '2018-04-25 08:35:34',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            73 => 
            array (
                'id' => 74,
                'document_id' => 46298,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:38',
                'updated_at' => '2018-04-25 08:35:38',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            74 => 
            array (
                'id' => 75,
                'document_id' => 18657,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:42',
                'updated_at' => '2018-04-25 08:35:42',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            75 => 
            array (
                'id' => 76,
                'document_id' => 20476,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:35:53',
                'updated_at' => '2018-04-25 08:35:53',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            76 => 
            array (
                'id' => 77,
                'document_id' => 20477,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:09',
                'updated_at' => '2018-04-25 08:36:09',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            77 => 
            array (
                'id' => 78,
                'document_id' => 17918,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:15',
                'updated_at' => '2018-04-25 08:36:15',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            78 => 
            array (
                'id' => 79,
                'document_id' => 20293,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:30',
                'updated_at' => '2018-04-25 08:36:30',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            79 => 
            array (
                'id' => 80,
                'document_id' => 46212,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:38',
                'updated_at' => '2018-04-25 08:36:38',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            80 => 
            array (
                'id' => 81,
                'document_id' => 20131,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:46',
                'updated_at' => '2018-04-25 08:36:46',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
            81 => 
            array (
                'id' => 82,
                'document_id' => 46557,
                'folder_id' => 8,
                'created_at' => '2018-04-25 08:36:54',
                'updated_at' => '2018-04-25 08:36:54',
                'deleted_at' => NULL,
                'is_deleted' => 0,
            ),
        ));
        
        
    }
}