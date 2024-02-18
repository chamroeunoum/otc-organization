<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Write the dumpmy data for the application
         */

        /**
         * Create accounts
         */
        /**
         * Create admin user for development purpose
         */
        $chamroeunoum = \App\Models\User::create([
            'firstname' => 'Chamroeun' ,
            'lastname' => 'OUM' ,
            'email' => 'chamroeunoum@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '012557200' ,
            'username' => 'chamroeunoum'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $chamroeunoum->firstname , 
            'lastname' => $chamroeunoum->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $chamroeunoum->phone , 
            'email' => $chamroeunoum->email
        ]);
        $chamroeunoum->people_id = $people->id ;
        $chamroeunoum->save();

        /**
         * Create client user for development purpose
         */
        $puthireach = \App\Models\User::create([
            'firstname' => 'Puthireach' ,
            'lastname' => 'KONGCHAN' ,
            'email' => 'kongchanputhireach@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => '010517515' ,
            'username' => 'kcputhireach' 
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $chamroeunoum->firstname , 
            'lastname' => $chamroeunoum->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $puthireach->phone , 
            'email' => $puthireach->email
        ]);
        $puthireach->people_id = $people->id ;
        $puthireach->save();

        /**
         * Create role for the user
         */
        $super = \App\Models\Role::create([
            'name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service'
        ]);
        $administrator = \App\Models\Role::create([
            'name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service'
        ]);
        $backendMember = \App\Models\Role::create([
            'name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service'
        ]);
        $client = \App\Models\Role::create([
            'name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp'
        ]);

        $chamroeunoum->roles()->sync( $administrator );
        $puthireach->roles()->sync( $client );

        $this->call( YpCategoriesTableSeeder::class );
        $this->call( YpProductsTableSeeder::class );
    }
}