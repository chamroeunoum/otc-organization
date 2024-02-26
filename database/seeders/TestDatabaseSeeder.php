<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PDF;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // /**
        //  * Create role for the user
        //  */
        // /**
        //  * Create role for the user
        //  */
        // $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $backendMember = \App\Models\Role::create(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $client = \App\Models\Role::create(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp']);

        // /**
        //  * Create accounts
        //  */
        // /**
        //  * Create admin user for development purpose
        //  */
        // $chamroeunoum = \App\Models\User::create([
        //     'firstname' => 'Chamroeun' ,
        //     'lastname' => 'OUM' ,
        //     'email' => 'chamroeunoum@gmail.com' ,
        //     'active' => 1 ,
        //     'password' => bcrypt('031884Chamroeunoum') ,
        //     'phone' => '012557200' ,
        //     'username' => 'chamroeunoum'
        // ]);
        
        // $people = \App\Models\People\People::create([
        //     'firstname' => $chamroeunoum->firstname , 
        //     'lastname' => $chamroeunoum->lastname , 
        //     'gender' => 0 , // Male
        //     'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
        //     'mobile_phone' => $chamroeunoum->phone , 
        //     'email' => $chamroeunoum->email
        // ]);
        // $chamroeunoum->people_id = $people->id ;
        // $chamroeunoum->save();
        // $chamroeunoum->assignRole( $administrator );

        // /**
        //  * Create client user for development purpose
        //  */
        // $puthireach = \App\Models\User::create([
        //     'firstname' => 'Puthireach' ,
        //     'lastname' => 'KONGCHAN' ,
        //     'email' => 'kongchanputhireach@gmail.com' ,
        //     'active' => 1 ,
        //     'password' => bcrypt('1234567890+1') ,
        //     'phone' => '010517515' ,
        //     'username' => 'kcputhireach'
        // ]);
        
        // $people = \App\Models\People\People::create([
        //     'firstname' => $puthireach->firstname , 
        //     'lastname' => $puthireach->lastname , 
        //     'gender' => 0 , // Male
        //     'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
        //     'mobile_phone' => $puthireach->phone , 
        //     'email' => $puthireach->email
        // ]);
        // $puthireach->people_id = $people->id ;
        // $puthireach->save();
        // $puthireach->assignRole( $backendMember );

        // /**
        //  * Create client user for development purpose
        //  */
        // $bellamudhita = \App\Models\User::create([
        //     'firstname' => 'Bella Mudhita' ,
        //     'lastname' => 'KONGCHAN' ,
        //     'email' => 'kongchanbellamudhita@gmail.com' ,
        //     'active' => 1 ,
        //     'password' => bcrypt('1234567890+1') ,
        //     'phone' => '010517515' ,
        //     'username' => 'kcbellamudhita'
        // ]);
        
        // $people = \App\Models\People\People::create([
        //     'firstname' => $bellamudhita->firstname , 
        //     'lastname' => $bellamudhita->lastname , 
        //     'gender' => 0 , // Male
        //     'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
        //     'mobile_phone' => $bellamudhita->phone , 
        //     'email' => $bellamudhita->email
        // ]);
        // $bellamudhita->people_id = $people->id ;
        // $bellamudhita->save();
        // $bellamudhita->assignRole( $client );

        // $this->call(TagsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(UserRoleTableSeeder::class);
        // $this->call(TimeslotsTableSeeder::class);
        // $this->call(UserTimeslotsTableSeeder::class);
        // $this->call(PeopleTableSeeder::class);
        // $this->call(PeoplePositionsTableSeeder::class);
        // $this->call(PeopleCountesiesTableSeeder::class);
        // $this->call(OrganizationLeaderTableSeeder::class);
        // $this->call(OrganizationPeopleTableSeeder::class);
        // $this->call(MeetingsTableSeeder::class);
        // $this->call(MeetingRoomsTableSeeder::class);
        // $this->call(MeetingOrganizationsTableSeeder::class);
        // $this->call(MeetingMembersTableSeeder::class);
        // $this->call(MeetingAttendantsTableSeeder::class);
        // $this->call(RegulatorsTableSeeder::class);
        // $this->call(RegulatorTypesTableSeeder::class);
        // $this->call(RegulatorSignaturesTableSeeder::class);
        // $this->call(OrganizationRegulatorsTableSeeder::class);
        // $this->call(OrganizationOwnRegulatorsTableSeeder::class);
        // $this->call(OrganizationRelatedRegulatorsTableSeeder::class);
        // Call this class for postgres to create sequence for each table
        $this->call(PostgresSetSequence::class);

        // $tables = null ;
        // if( env('DB_CONNECTION' , '' ) == 'mysql' ){
        //     $tables = \DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
        // }else if( env('DB_CONNECTION' , '' ) == 'pgsql' ){
        //     $tables = \DB::select("SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname='public'");
        // }
        // foreach($tables as $table){
        //     if( in_array( 
        //         $table->tablename 
        //         , [ 
        //             'migrations' , 'oauth_auth_codes' , 'oauth_access_tokens' , 'oauth_refresh_tokens' 
        //             , 'oauth_clients' , 'oauth_personal_access_clients' , 'password_resets' , 'activity_log' 
        //             , 'failed_jobs' , 'personal_access_tokens' , 'permissions' , 'model_has_permissions'
        //             , 'model_has_roles' , 'role_has_permissions'
        //             ] 
        //         ) 
        //     ) continue ;
        //     echo "RESTART THE SECQUENCE FOR TABLE : " . $table->tablename . PHP_EOL ;
        //     \DB::statement("SELECT setval('". $table->tablename ."_id_seq', 21, true)");
        // }
    }
}
