<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDF;

class DatabaseSeeder extends Seeder
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
        // $super = \App\Models\Role::create(['name' => 'super', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $administrator = \App\Models\Role::create(['name' => 'admin', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $backendMember = \App\Models\Role::create(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $client = \App\Models\Role::create(['name' => 'client', 'guard_name' => 'api' , 'tag' => 'client_service']);

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

        $this->call(TagsTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        $this->call(PeopleTableSeeder::class);
        $this->call(PeoplePositionsTableSeeder::class);
        $this->call(PeopleCountesiesTableSeeder::class);

        $this->call(TimeslotsTableSeeder::class);
        $this->call(UserTimeslotsTableSeeder::class);
        
        $this->call(OrganizationLeaderTableSeeder::class);
        $this->call(OrganizationPeopleTableSeeder::class);

        $this->call(MeetingsTableSeeder::class);
        $this->call(MeetingRoomsTableSeeder::class);
        $this->call(MeetingOrganizationsTableSeeder::class);
        $this->call(MeetingMembersTableSeeder::class);
        $this->call(MeetingAttendantsTableSeeder::class);

        $this->call(RegulatorsTableSeeder::class);
        $this->call(RegulatorTypesTableSeeder::class);
        $this->call(RegulatorSignaturesTableSeeder::class);
        $this->call(OrganizationRegulatorsTableSeeder::class);
        $this->call(OrganizationOwnRegulatorsTableSeeder::class);
        $this->call(OrganizationRelatedRegulatorsTableSeeder::class);

        // About the content of the regulator
        $this->call(BooksTableSeeder::class);
        $this->call(KuntiesTableSeeder::class);
        $this->call(MatikasTableSeeder::class);
        $this->call(ChaptersTableSeeder::class);
        $this->call(PartsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(MatrasTableSeeder::class);
        
        if( env('DB_CONNECTION','mysql') == 'pgsql' ){
            
            echo 'RUN INDEXING OF ROLES' . PHP_EOL;
            \DB::statement("SELECT setval('roles_id_seq', (SELECT MAX(id) FROM roles ), true );");

            echo 'RUN INDEXING OF USERS' . PHP_EOL;
            \DB::statement("SELECT setval('users_id_seq', (SELECT MAX(id) FROM users ), true );");

            echo 'RUN INDEXING OF USER ROLE' . PHP_EOL;
            \DB::statement("SELECT setval('user_role_id_seq', (SELECT MAX(id) FROM user_role ), true );");

            echo 'RUN INDEXING OF PEOPLE' . PHP_EOL;
            \DB::statement("SELECT setval('people_id_seq', (SELECT MAX(id) FROM people ), true );");

            // echo 'RUN INDEXING OF ORGANIZATION PEOPLE' . PHP_EOL;
            // \DB::statement("SELECT setval('organization_people_pkey', (SELECT MAX(id) FROM organization_people ) , true );");

            echo 'RUN INDEXING OF TAGS' . PHP_EOL;
            \DB::statement("SELECT setval('tags_id_seq', (SELECT MAX(id) FROM tags ), true );");

            echo 'RUN INDEXING OF REGULATORS' . PHP_EOL;
            \DB::statement("SELECT setval('regulators_id_seq', (SELECT MAX(id) FROM regulators ), true );");

            echo 'RUN INDEXING OF REGULATOR TYPES' . PHP_EOL;
            \DB::statement("SELECT setval('regulator_types_id_seq', (SELECT MAX(id) FROM regulator_types ), true );");

            echo 'RUN INDEXING OF REGULATOR SIGNATURES' . PHP_EOL;
            \DB::statement("SELECT setval('regulator_signatures_id_seq', (SELECT MAX(id) FROM regulator_signatures ), true );");

            echo 'RUN INDEXING OF ORGANIZATION REGULATORS' . PHP_EOL;
            \DB::statement("SELECT setval('organization_regulators_id_seq', (SELECT MAX(id) FROM organization_regulators ), true );");

            echo 'RUN INDEXING OF ORGANIZATION OWN REGULATORS' . PHP_EOL;
            \DB::statement("SELECT setval('organization_own_regulators_id_seq', (SELECT MAX(id) FROM organization_own_regulators ), true );");

            echo 'RUN INDEXING OF ORGANIZATION RELATED REGULATORS' . PHP_EOL;
            \DB::statement("SELECT setval('organization_related_regulators_id_seq', (SELECT MAX(id) FROM organization_related_regulators ), true );");

            echo 'RUN INDEXING OF TIMESLOT ' . PHP_EOL;
            \DB::statement("SELECT setval('timeslots_id_seq', (SELECT MAX(id) FROM timeslots ), true );");

            echo 'RUN INDEXING OF USER TIMESLOT ' . PHP_EOL;
            \DB::statement("SELECT setval('user_timeslots_id_seq', (SELECT MAX(id) FROM user_timeslots ), true );");

            echo 'RUN INDEXING OF BOOK ' . PHP_EOL;
            \DB::statement("SELECT setval('books_id_seq', (SELECT MAX(id) FROM books ), true );");

            echo 'RUN INDEXING OF KUNTY ' . PHP_EOL;
            \DB::statement("SELECT setval('kunties_id_seq', (SELECT MAX(id) FROM kunties ), true );");

            echo 'RUN INDEXING OF MATIKA ' . PHP_EOL;
            \DB::statement("SELECT setval('matikas_id_seq', (SELECT MAX(id) FROM matikas ), true );");

            echo 'RUN INDEXING OF CHAPTER ' . PHP_EOL;
            \DB::statement("SELECT setval('chapters_id_seq', (SELECT MAX(id) FROM chapters ), true );");

            echo 'RUN INDEXING OF PART ' . PHP_EOL;
            \DB::statement("SELECT setval('parts_id_seq', (SELECT MAX(id) FROM parts ), true );");
            
            echo 'RUN INDEXING OF SECTION ' . PHP_EOL;
            \DB::statement("SELECT setval('sections_id_seq', (SELECT MAX(id) FROM sections ), true );");

            echo 'RUN INDEXING OF MATRA ' . PHP_EOL;
            \DB::statement("SELECT setval('matras_id_seq', (SELECT MAX(id) FROM matras ), true );");
        }
    }
}
