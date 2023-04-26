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
            'password' => bcrypt('1234567890+1') ,
            'phone' => '012557200' ,
            'username' => 'chamroeunoum'
        ]);
        
        $people = \App\Models\People::create([
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
         * Create role for the user
         */
        $super = \App\Models\Role::create(['name' => 'Super Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $administrator = \App\Models\Role::create(['name' => 'Administrator', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $backendMember = \App\Models\Role::create(['name' => 'Backend member', 'guard_name' => 'api' , 'tag' => 'core_service']);

        $client = \App\Models\Role::create(['name' => 'Client', 'guard_name' => 'api' , 'tag' => 'webapp']);

        /**
         * Permissions
         */
        /**
         * Loan permissions for admin
         */
        $documentPermissions = [] ;
        $documentPermissions['list'] = \App\Models\Permission::create(['name' => 'list documents', 'guard_name' => 'api']);
        $documentPermissions['create'] = \App\Models\Permission::create(['name' => 'create document', 'guard_name' => 'api']);
        $documentPermissions['update'] = \App\Models\Permission::create(['name' => 'update document', 'guard_name' => 'api']);
        $documentPermissions['delete'] = \App\Models\Permission::create(['name' => 'delete document', 'guard_name' => 'api']);

        $userPermissions = [] ;
        $userPermissions['list'] = \App\Models\Permission::create(['name' => 'list users', 'guard_name' => 'api']);
        $userPermissions['create'] = \App\Models\Permission::create(['name' => 'create user', 'guard_name' => 'api']);
        $userPermissions['update'] = \App\Models\Permission::create(['name' => 'update user', 'guard_name' => 'api']);
        $userPermissions['delete'] = \App\Models\Permission::create(['name' => 'delete user', 'guard_name' => 'api']);
    
        $chamroeunoum->assignRole( $super );


        \App\Models\DocumentType::create([ 'name' => 'រដ្ឋបាល' , 'format' => '' , 'color' => '#FAFAFA' , 'document_index' => 0 ]);
        \App\Models\DocumentType::create([ 'name' => 'ហិរញ្ញវត្ថុ' , 'format' => '' , 'color' => '#FAFAFA' , 'document_index' => 0 ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UsersTableSeeder::class);
        // $this->call(CountesiesTableSeeder::class);
        // $this->call(PeopleTableSeeder::class);
        // $this->call(TypesTableSeeder::class);
        // $this->call(MinistriesTableSeeder::class);
        // $this->call(DocumentsTableSeeder::class);
        // $this->call(DocumentGroupsTableSeeder::class);
        // $this->call(DocumentMinistriesTableSeeder::class);
        // $this->call(DocumentRelatedMinistriesTableSeeder::class);
        // $this->call(DocumentSignaturesTableSeeder::class);
        // $this->call(DocumentUsersTableSeeder::class);
        // $this->call(GroupsTableSeeder::class);
        // $this->call(SignaturesTableSeeder::class);
        // $this->call(MinistryPeopleTableSeeder::class);
        // $this->call(PeopleInDocumentsTableSeeder::class);
        // $this->call(UnitTeamworkTypesTableSeeder::class);
        // $this->call(UnitTeamworkRegulatorsTableSeeder::class);
        // $this->call(OfficerRanksTableSeeder::class);
        // $this->call(DocumentOwnMinistriesTableSeeder::class);
        // $this->call(PopmessageTableSeeder::class);
        // $this->call(YpCategoriesTableSeeder::class);
        // $this->call(YpProductsTableSeeder::class);
    }
}
