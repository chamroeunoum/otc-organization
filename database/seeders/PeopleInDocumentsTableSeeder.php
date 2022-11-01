<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class PeopleInDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('people_in_documents')->delete();
        
        
        
    }
}