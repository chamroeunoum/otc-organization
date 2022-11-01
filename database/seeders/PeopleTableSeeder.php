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
                'countesy_id' => 3,
                'firstname' => 'ចំរើន',
                'lastname' => 'អ៊ុំ',
                'gender' => 1,
                'dob' => '1984-03-18',
                'mobile_phone' => '012 557200',
                'office_phone' => '010278400',
                'email' => 'chamroeunoum@gmail.com',
                'nid' => 10123456,
                'image' => 'uploads/profiles/c4692c85d696b6428dbf9365bc76a91d.jpg',
                'marry_status' => '1',
                'father' => 'អ៊ុំ គង់',
                'mother' => 'និត សីលា',
                'created_at' => '2017-07-27 10:38:26',
                'updated_at' => '2017-07-27 10:51:57',
                'deleted_at' => NULL,
                'created_by' => '0',
                'modified_by' => '0',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}