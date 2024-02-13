<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDF;

class TestDataOrganizationStaffsAndRegulatorsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TagsTableSeeder::class);
        \DB::statement("SELECT setval('tags_id_seq', (SELECT MAX(id) FROM tags )+1);");
        $positions = \App\Models\Regulator\Tag\Position::where('model','App\Models\Regulator\Tag\Position')->first()->children()->get();
        $royalGovernmentOrganization = \App\Models\Regulator\Tag\Organization::where('model','App\Models\Regulator\Tag\Organization')->first();
        $organizations = $royalGovernmentOrganization->children()->where('name','LIKE','ក្រសួង%')->get();

        // $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $backendMember = \App\Models\Role::create(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service']);
        // $client = \App\Models\Role::create(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp']);

        $super = \App\Models\Role::where(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service'])->first();
        $administrator = \App\Models\Role::where(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service'])->first();
        $backendMember = \App\Models\Role::where(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service'])->first();
        $client = \App\Models\Role::where(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp'])->first();

        /**
         * Create admin user for development purpose
         */
        $superaccount = \App\Models\User::findOrCreate([
            'firstname' => 'Chamroeun' ,
            'lastname' => 'OUM' ,
            'email' => 'superuser@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '012391848' ,
            'username' => 'superuser'
        ]);
        
        $people = \App\Models\People\People::findOrCreate([
            'firstname' => $superaccount->firstname , 
            'lastname' => $superaccount->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $superaccount->phone , 
            'email' => $superaccount->email
        ]);
        $superaccount->people_id = $people->id ;
        $superaccount->save();
        $superaccount->assignRole( $super );


        /**
         * Create admin user for development purpose
         */
        $chamroeunoum = \App\Models\User::findOrCreate([
            'firstname' => 'Chamroeun' ,
            'lastname' => 'OUM' ,
            'email' => 'chamroeunoum@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '012557200' ,
            'username' => 'chamroeunoum'
        ]);
        
        $people = \App\Models\People\People::findOrCreate([
            'firstname' => $chamroeunoum->firstname , 
            'lastname' => $chamroeunoum->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $chamroeunoum->phone , 
            'email' => $chamroeunoum->email
        ]);
        $chamroeunoum->people_id = $people->id ;
        $chamroeunoum->save();
        $chamroeunoum->assignRole( $administrator );

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
        //     'dob' => \Carbon\Carbon::parse('2015-04-01') ,
        //     'mobile_phone' => $puthireach->phone , 
        //     'email' => $puthireach->email
        // ]);
        // $puthireach->people_id = $people->id ;
        // $puthireach->save();
        // $puthireach->assignRole( $backendMember );
        
        /**
         * The Prime Minister of Cambodia
         */
        $primeMinister = \App\Models\User::create([
            'firstname' => "រដ្ឋមន្ត្រី" ,
            'lastname' => "នាយក" ,
            'email' => 'primeminister@ocm.gov.kh' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => fake()->phoneNumber ,
            'username' => "primeminister"
        ]);
        $people = \App\Models\People\People::create([
            'firstname' => $account->firstname , 
            'lastname' => $account->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1970-01-01') ,
            'mobile_phone' => $account->phone ,
            'email' => $account->email
        ]);
        $account->people_id = $people->id ;
        $account->save();
        $account->assignRole( $backendMember );
        /**
         * Assign position as Prime Minister of Royal Cambodia
         */
        $account->syncWithoutDetaching([ $royalGovernmentOrganization->id ]);


        /**
         * The Deputy Prime Minister of Cambodia
         */
        $deputyPrimeMinister = \App\Models\User::create([
            'firstname' => "Prime Minister" ,
            'lastname' => "Deputy" ,
            'email' => 'deputyprimeminister@ocm.gov.kh' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => fake()->phoneNumber ,
            'username' => "deputyprimeminister"
        ]);
        $people = \App\Models\People\People::create([
            'firstname' => $deputyPrimeMinister->firstname , 
            'lastname' => $deputyPrimeMinister->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1970-01-01') ,
            'mobile_phone' => $deputyPrimeMinister->phone ,
            'email' => $deputyPrimeMinister->email
        ]);
        $deputyPrimeMinister->people_id = $people->id ;
        $deputyPrimeMinister->save();
        $deputyPrimeMinister->assignRole( $backendMember );
        $deputyPrimeMinister->syncWithoutDetaching([ $royalGovernmentOrganization->children()->first() ]);

        /**
         * Create accounts of ministers
         */
        for( $i = 0 ; $i <= 25 ; $i++ ){
            list($fistname, $lastname) = fake()->name ;
            /**
             * Create client user for development purpose
             */
            $account = \App\Models\User::create([
                'firstname' => "" ,
                'lastname' => "" ,
                'email' => explode( "@" , fake()->email )[0] . '@ocm.gov.kh' ,
                'active' => 1 ,
                'password' => bcrypt('1234567890+1') ,
                'phone' => fake()->phoneNumber ,
                'username' => 'minister1'
            ]);
            $people = \App\Models\People\People::create([
                'firstname' => $account->firstname , 
                'lastname' => $account->lastname , 
                'gender' => 0 , // Male
                'dob' => \Carbon\Carbon::parse('2015-04-01') ,
                'mobile_phone' => $account->phone , 
                'email' => $account->email
            ]);
            $account->people_id = $people->id ;
            $account->save();
            $account->assignRole( $account );
        }

        /**
         * Assign leader to an organization
         */



        /**
         * Assign position to a leader (staff)
         */



        /**
         * Staff under manage
         */

        

        
        
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
        

        
        // $this->call(RolesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(PeopleTableSeeder::class);
        // $this->call(UserRoleTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
        // $this->call(RegulatorsTableSeeder::class);
        // $this->call(RegulatorTypesTableSeeder::class);
        // $this->call(RegulatorSignaturesTableSeeder::class);
        // $this->call(OrganizationRegulatorsTableSeeder::class);
        // $this->call(OrganizationOwnRegulatorsTableSeeder::class);
        // $this->call(OrganizationRelatedRegulatorsTableSeeder::class);
        // $this->call(PositionUsersTableSeeder::class);
        // $this->call(OrganizationStaffsTableSeeder::class);

        // echo 'RUN INDEXING OF ROLES' . PHP_EOL;
        // \DB::statement("SELECT setval('roles_id_seq', (SELECT MAX(id) FROM roles )+1);");
        // echo 'RUN INDEXING OF USERS' . PHP_EOL;
        // \DB::statement("SELECT setval('users_id_seq', (SELECT MAX(id) FROM users )+1);");
        // echo 'RUN INDEXING OF USER ROLE' . PHP_EOL;
        // \DB::statement("SELECT setval('user_role_id_seq', (SELECT MAX(id) FROM user_role )+1);");
        // echo 'RUN INDEXING OF PEOPLE' . PHP_EOL;
        // \DB::statement("SELECT setval('people_id_seq', (SELECT MAX(id) FROM people )+1);");
        // echo 'RUN INDEXING OF TAGS' . PHP_EOL;
        // \DB::statement("SELECT setval('tags_id_seq', (SELECT MAX(id) FROM tags )+1);");
        // echo 'RUN INDEXING OF REGULATORS' . PHP_EOL;
        // \DB::statement("SELECT setval('regulators_id_seq', (SELECT MAX(id) FROM regulators )+1);");
        // echo 'RUN INDEXING OF REGULATOR TYPES' . PHP_EOL;
        // \DB::statement("SELECT setval('regulator_types_id_seq', (SELECT MAX(id) FROM regulator_types )+1);");
        // echo 'RUN INDEXING OF REGULATOR SIGNATURES' . PHP_EOL;
        // \DB::statement("SELECT setval('regulator_signatures_id_seq', (SELECT MAX(id) FROM regulator_signatures )+1);");
        // echo 'RUN INDEXING OF ORGANIZATION REGULATORS' . PHP_EOL;
        // \DB::statement("SELECT setval('organization_regulators_id_seq', (SELECT MAX(id) FROM organization_regulators )+1);");
        // echo 'RUN INDEXING OF ORGANIZATION OWN REGULATORS' . PHP_EOL;
        // \DB::statement("SELECT setval('organization_own_regulators_id_seq', (SELECT MAX(id) FROM organization_own_regulators )+1);");
        // echo 'RUN INDEXING OF ORGANIZATION RELATED REGULATORS' . PHP_EOL;
        // \DB::statement("SELECT setval('organization_related_regulators_id_seq', (SELECT MAX(id) FROM organization_related_regulators )+1);");
        // echo 'RUN INDEXING OF POSITION USERS' . PHP_EOL;
        // \DB::statement("SELECT setval('position_users_id_seq', (SELECT MAX(id) FROM position_users )+1);");
        // echo 'RUN INDEXING OF ORGANIZATION STAFFS ' . PHP_EOL;
        // \DB::statement("SELECT setval('organization_staffs_id_seq', (SELECT MAX(id) FROM organization_staffs )+1);");


        /**
         * Create more data for user to create
         */

    }
}
