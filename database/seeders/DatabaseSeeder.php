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
        // /**
        //  * Create role for the user
        //  */
        // $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $backendMember = \App\Models\Role::create(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service']);
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

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RegulatorsTableSeeder::class);
        $this->call(RegulatorTypesTableSeeder::class);
        $this->call(RegulatorSignaturesTableSeeder::class);
        $this->call(OrganizationRegulatorsTableSeeder::class);
        $this->call(OrganizationOwnRegulatorsTableSeeder::class);
        $this->call(OrganizationRelatedRegulatorsTableSeeder::class);
        $this->call(PositionUsersTableSeeder::class);
        $this->call(OrganizationStaffsTableSeeder::class);

        echo 'RUN INDEXING OF ROLES' . PHP_EOL;
        \DB::statement("SELECT setval('roles_id_seq', (SELECT MAX(id) FROM roles )+1);");
        echo 'RUN INDEXING OF USERS' . PHP_EOL;
        \DB::statement("SELECT setval('users_id_seq', (SELECT MAX(id) FROM users )+1);");
        echo 'RUN INDEXING OF USER ROLE' . PHP_EOL;
        \DB::statement("SELECT setval('user_role_id_seq', (SELECT MAX(id) FROM user_role )+1);");
        echo 'RUN INDEXING OF PEOPLE' . PHP_EOL;
        \DB::statement("SELECT setval('people_id_seq', (SELECT MAX(id) FROM people )+1);");
        echo 'RUN INDEXING OF TAGS' . PHP_EOL;
        \DB::statement("SELECT setval('tags_id_seq', (SELECT MAX(id) FROM tags )+1);");
        echo 'RUN INDEXING OF REGULATORS' . PHP_EOL;
        \DB::statement("SELECT setval('regulators_id_seq', (SELECT MAX(id) FROM regulators )+1);");
        echo 'RUN INDEXING OF REGULATOR TYPES' . PHP_EOL;
        \DB::statement("SELECT setval('regulator_types_id_seq', (SELECT MAX(id) FROM regulator_types )+1);");
        echo 'RUN INDEXING OF REGULATOR SIGNATURES' . PHP_EOL;
        \DB::statement("SELECT setval('regulator_signatures_id_seq', (SELECT MAX(id) FROM regulator_signatures )+1);");
        echo 'RUN INDEXING OF ORGANIZATION REGULATORS' . PHP_EOL;
        \DB::statement("SELECT setval('organization_regulators_id_seq', (SELECT MAX(id) FROM organization_regulators )+1);");
        echo 'RUN INDEXING OF ORGANIZATION OWN REGULATORS' . PHP_EOL;
        \DB::statement("SELECT setval('organization_own_regulators_id_seq', (SELECT MAX(id) FROM organization_own_regulators )+1);");
        echo 'RUN INDEXING OF ORGANIZATION RELATED REGULATORS' . PHP_EOL;
        \DB::statement("SELECT setval('organization_related_regulators_id_seq', (SELECT MAX(id) FROM organization_related_regulators )+1);");
        echo 'RUN INDEXING OF POSITION USERS' . PHP_EOL;
        \DB::statement("SELECT setval('position_users_id_seq', (SELECT MAX(id) FROM position_users )+1);");
        echo 'RUN INDEXING OF ORGANIZATION STAFFS ' . PHP_EOL;
        \DB::statement("SELECT setval('organization_staffs_id_seq', (SELECT MAX(id) FROM organization_staffs )+1);");

        /**
         * Create more data for user to create
         */

        $this->call(TimeslotsTableSeeder::class);
    }
}
