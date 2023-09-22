<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('people')->delete();
        
        \DB::table('people')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'Chamroeun',
                'lastname' => 'OUM',
                'gender' => 0,
                'dob' => '1984-03-18',
                'mobile_phone' => '012557200',
                'office_phone' => NULL,
                'email' => 'chamroeunoum@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'Puthireach',
                'lastname' => 'KONGCHAN',
                'gender' => 0,
                'dob' => '1984-03-18',
                'mobile_phone' => '010517515',
                'office_phone' => NULL,
                'email' => 'kongchanputhireach@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-10 06:44:28',
                'updated_at' => '2023-09-10 06:44:28',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'firstname' => 'ប៊ុនឈាង',
                'lastname' => 'ណែត',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '081333609',
                'office_phone' => NULL,
                'email' => 'nethbunchheang@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'firstname' => 'គាងសេង',
                'lastname' => 'គី',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '077788827',
                'office_phone' => NULL,
                'email' => 'keangseng007@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'firstname' => 'ធារិទ្ធិ',
                'lastname' => 'ទូច',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '011888158',
                'office_phone' => NULL,
                'email' => 'tearith_touch@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'firstname' => 'ម៉ាណេត',
                'lastname' => 'ញ៉ែម',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '017300200',
                'office_phone' => NULL,
                'email' => 'nmaneth@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'firstname' => 'រតនា',
                'lastname' => 'រស់',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '089 709 666',
                'office_phone' => NULL,
                'email' => 'ratanaros@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'firstname' => 'នីវ៉ាដូ',
                'lastname' => 'ហេង',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '076 6666449',
                'office_phone' => NULL,
                'email' => 'vadocm@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'firstname' => 'រដ្ឋា',
                'lastname' => 'រិន',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => NULL,
                'office_phone' => NULL,
                'email' => 'ratha.thk@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'firstname' => 'ធី',
                'lastname' => 'សុទ្ធ',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '0964377155',
                'office_phone' => NULL,
                'email' => 'sothynla@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'firstname' => 'រដ្ឋា',
                'lastname' => 'ហ៊ី',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => NULL,
                'office_phone' => NULL,
                'email' => 'rathahy@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'firstname' => 'សំអាតវាសនា',
                'lastname' => 'មុតខ្វាន់',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '093777032',
                'office_phone' => NULL,
                'email' => 'veasnamut1@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'firstname' => 'ពេជ្រយ៉ាតសេន',
                'lastname' => 'គុណ',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '077866889',
                'office_phone' => NULL,
                'email' => 'pechyathsen_kun@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'firstname' => 'chamnan',
                'lastname' => 'uk',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '012999999',
                'office_phone' => NULL,
                'email' => 'ukchamnan007@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'firstname' => 'sothun',
                'lastname' => 'song',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '016870818',
                'office_phone' => NULL,
                'email' => 'songsothun@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'firstname' => 'ចាន់អេណា',
                'lastname' => 'យោង',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => NULL,
                'office_phone' => NULL,
                'email' => 'enayaung@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'firstname' => 'សុខុន',
                'lastname' => 'អ៊ី',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '012997027',
                'office_phone' => NULL,
                'email' => 'isokhon@yahoo.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'firstname' => 'vanra',
                'lastname' => 'soth',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => NULL,
                'office_phone' => NULL,
                'email' => 'sothvaran@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'firstname' => 'វុទ្ធី',
                'lastname' => 'គង់',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '077376376',
                'office_phone' => NULL,
                'email' => 'vuthykong03@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'firstname' => 'ប៉ាថ្លាវី',
                'lastname' => 'ស៊ន',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '095968008',
                'office_phone' => NULL,
                'email' => 'sornpathlavy@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'firstname' => 'និពន្ធ',
                'lastname' => 'អ៊ុច',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '011755069',
                'office_phone' => NULL,
                'email' => 'ouchnipon@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'firstname' => 'ផាន់ណា',
                'lastname' => 'ឌុំ',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => '011375523',
                'office_phone' => NULL,
                'email' => 'phanna@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'firstname' => 'វណ្ណៈ',
                'lastname' => 'ធឿន',
                'gender' => NULL,
                'dob' => NULL,
                'mobile_phone' => NULL,
                'office_phone' => NULL,
                'email' => 'vannak@gmail.com',
                'nid' => NULL,
                'image' => NULL,
                'marry_status' => NULL,
                'father' => NULL,
                'mother' => NULL,
                'created_at' => '2023-09-13 15:04:55',
                'updated_at' => '2023-09-13 15:04:55',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'modified_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}