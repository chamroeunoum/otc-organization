<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '/document/create',
                'title' => 'បង្កើត ឬ បន្ថែម ឯកសារ',
                'created_at' => '2017-04-04 03:30:52',
                'updated_at' => '2017-07-28 05:43:07',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '/document/update',
                'title' => 'ការប្រែព័ត៌មានឯកសារ',
                'created_at' => '2017-04-04 03:33:51',
                'updated_at' => '2017-07-28 05:43:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '/document/delete',
                'title' => 'លុប ឯកសារ',
                'created_at' => '2017-04-04 03:34:41',
                'updated_at' => '2017-07-28 05:43:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '/document/list',
                'title' => 'បង្ហាញបញ្ជីឯកសារ',
                'created_at' => '2017-04-04 03:35:00',
                'updated_at' => '2017-07-28 05:43:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '/document/show',
                'title' => 'អានព័ត៌មានអំពីឯកសារ',
                'created_at' => '2017-04-04 03:35:10',
                'updated_at' => '2017-07-28 05:43:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '/document/download',
                'title' => 'ទាញយកឯកសារ',
                'created_at' => '2017-04-23 07:44:58',
                'updated_at' => '2017-07-28 05:43:45',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '/document/private_public',
                'title' => 'ឯកសារជា សាធារណៈ ឬ ឯកជន',
                'created_at' => '2017-07-07 09:27:54',
                'updated_at' => '2017-07-28 05:44:32',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '/document/publish',
                'title' => 'បើក ឬ បិទ ការប្រើប្រាស់ឯកសារ',
                'created_at' => '2017-07-07 09:28:13',
                'updated_at' => '2017-07-28 05:44:41',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '/user/list',
                'title' => 'ទំព័រ បញ្ជីអ្នកប្រើប្រាស់',
                'created_at' => '2017-07-28 05:38:22',
                'updated_at' => '2017-07-28 05:40:59',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '/user/create',
                'title' => 'ទំព័របង្កើត អ្នកប្រើប្រាស់',
                'created_at' => '2017-07-28 05:39:52',
                'updated_at' => '2017-07-28 05:40:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '/user/update',
                'title' => 'ទំព័រ កែប្រែព័ត៌មានអ្នកប្រើប្រាស់',
                'created_at' => '2017-07-28 05:42:02',
                'updated_at' => '2017-07-28 05:42:02',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '/user/delete',
                'title' => 'លុបអ្នកប្រើប្រាស់',
                'created_at' => '2017-07-28 05:42:35',
                'updated_at' => '2017-07-28 05:42:35',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '/permission/list',
                'title' => 'បញ្ជីគ្រប់គ្រងសិទ្ធិ',
                'created_at' => '2017-10-09 08:40:48',
                'updated_at' => '2017-10-09 14:53:01',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '/permission/create',
                'title' => 'បង្កើតសិទ្ធិ',
                'created_at' => '2017-10-09 23:20:20',
                'updated_at' => '2017-10-09 14:53:16',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '/permission/update',
                'title' => 'កែប្រែព័ត៌មានអំពីសិទ្ធិ',
                'created_at' => '2017-10-09 23:20:23',
                'updated_at' => '2017-10-09 14:53:42',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '/permission/delete',
                'title' => 'លុបសិទ្ធិ',
                'created_at' => '2017-10-09 23:20:27',
                'updated_at' => '2017-10-09 14:53:59',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '/role/create',
                'title' => 'បង្កើត តួនាទី',
                'created_at' => '2017-10-09 14:46:35',
                'updated_at' => '2017-10-09 14:46:35',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '/role/list',
                'title' => 'បញ្ជីព័ត៌មានតួនាទី',
                'created_at' => '2017-10-09 23:20:29',
                'updated_at' => '2017-10-09 14:54:16',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '/role/update',
                'title' => 'កែប្រែព័ត៌មានអំពីតួនាទី',
                'created_at' => '2017-10-09 23:20:32',
                'updated_at' => '2017-10-09 14:54:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '/role/delete',
                'title' => 'លុបតួនាទី',
                'created_at' => '2017-10-09 23:20:33',
                'updated_at' => '2017-10-09 14:55:00',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '/people/list',
                'title' => 'បញ្ជិព័ត៌មានអ្នកប្រើប្រាស់',
                'created_at' => '2017-10-09 14:51:02',
                'updated_at' => '2017-10-09 14:54:37',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '/people/create',
                'title' => 'បង្កើតព័ត៌មានអ្នកប្រើប្រាស់',
                'created_at' => '2017-10-09 14:51:18',
                'updated_at' => '2017-10-09 14:55:27',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '/people/update',
                'title' => 'កែប្រែព័ត៌មានអ្នកប្រើប្រាស់',
                'created_at' => '2017-10-09 14:51:28',
                'updated_at' => '2017-10-09 14:55:41',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '/people/delete',
                'title' => 'លុបអ្នកប្រើប្រាស់',
                'created_at' => '2017-10-09 14:51:36',
                'updated_at' => '2017-10-09 14:55:54',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '/signature/list',
                'title' => 'បញ្ជីព័ត៌មានហត្ថលេខា',
                'created_at' => '2017-10-09 14:57:28',
                'updated_at' => '2017-10-09 14:57:28',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '/signature/create',
                'title' => 'បង្កើតហត្ថលេខា',
                'created_at' => '2017-10-09 14:57:40',
                'updated_at' => '2017-10-09 14:58:27',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '/signature/update',
                'title' => 'កែប្រែព័ត៌មានហត្ថលេខា',
                'created_at' => '2017-10-09 14:58:00',
                'updated_at' => '2017-10-09 14:58:00',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '/signature/delete',
                'title' => 'លុបហត្ថលេខា',
                'created_at' => '2017-10-09 14:58:15',
                'updated_at' => '2017-10-09 14:58:15',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '/type/list',
                'title' => 'ប្រភេទឯកសារ',
                'created_at' => '2017-10-09 14:59:45',
                'updated_at' => '2017-10-09 14:59:45',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '/type/create',
                'title' => 'បង្កើតប្រភេទឯកសារ',
                'created_at' => '2017-10-09 14:59:59',
                'updated_at' => '2017-10-09 14:59:59',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '/type/update',
                'title' => 'កែប្រែព័ត៌មានប្រភេទឯកសារ',
                'created_at' => '2017-10-09 15:00:15',
                'updated_at' => '2017-10-09 15:00:15',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '/type/delete',
                'title' => 'លុបព័ត៌មានប្រភេទឯកសារ',
                'created_at' => '2017-10-09 15:00:38',
                'updated_at' => '2017-10-09 15:00:38',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => '/ministry/list',
                'title' => 'បញ្ជីព័ត៌មានក្រសួង',
                'created_at' => '2017-10-09 15:01:10',
                'updated_at' => '2017-10-09 15:01:10',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => '/ministry/create',
                'title' => 'បង្កើតក្រសួង',
                'created_at' => '2017-10-09 15:01:34',
                'updated_at' => '2017-10-09 15:01:34',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => '/ministry/update',
                'title' => 'កែប្រែព័ត៌មានក្រសួង',
                'created_at' => '2017-10-09 15:01:44',
                'updated_at' => '2017-10-09 15:01:44',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => '/ministry/delete',
                'title' => 'លុបក្រសួង',
                'created_at' => '2017-10-09 15:01:52',
                'updated_at' => '2017-10-09 15:01:52',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => '/countesy/list',
                'title' => 'បញ្ជីងារ',
                'created_at' => '2017-10-09 23:20:40',
                'updated_at' => '2017-10-09 23:20:42',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => '/countesy/create',
                'title' => 'បង្កើតងារ',
                'created_at' => '2017-10-09 23:21:03',
                'updated_at' => '2017-10-09 23:21:05',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => '/countesy/update',
                'title' => 'កែប្រែព័ត៌មានអំពីងារ',
                'created_at' => '2017-10-09 23:21:29',
                'updated_at' => '2017-10-09 23:21:31',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => '/countesy/delete',
                'title' => 'លុបព័ត៌មានអំពីងារ',
                'created_at' => '2017-10-09 23:21:49',
                'updated_at' => '2017-10-09 23:21:51',
            ),
        ));
        
        
    }
}