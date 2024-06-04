<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDF;
use Illuminate\Support\Facades\Schema;

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
         * Create role for the user
         */
        $super = \App\Models\Role::create(['name' => 'super', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $administrator = \App\Models\Role::create(['name' => 'admin', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $backendMember = \App\Models\Role::create(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $client = \App\Models\Role::create(['name' => 'client', 'guard_name' => 'api' , 'tag' => 'client_service']);

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
        //     'phone' => '012391848' ,
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
        // $chamroeunoum->assignRole( $super );

        // /**
        //  * Create admin user for development purpose
        //  */
        // $rosachan = \App\Models\User::create([
        //     'firstname' => 'Rosa' ,
        //     'lastname' => 'CHAN' ,
        //     'email' => 'rosthika@gmail.com' ,
        //     'active' => 1 ,
        //     'password' => bcrypt('031884Chamroeunoum') ,
        //     'phone' => '017391848' ,
        //     'username' => 'rosachan'
        // ]);
        
        // $people = \App\Models\People\People::create([
        //     'firstname' => $rosachan->firstname , 
        //     'lastname' => $rosachan->lastname , 
        //     'gender' => 1 , // Male
        //     'dob' => \Carbon\Carbon::parse('1983-02-23 9:00') ,
        //     'mobile_phone' => $rosachan->phone , 
        //     'email' => $rosachan->email
        // ]);
        // $rosachan->people_id = $people->id ;
        // $rosachan->save();
        // $rosachan->assignRole( $administrator );

        // /**
        //  * Create client user for development purpose
        //  */
        // $puthireach = \App\Models\User::create([
        //     'firstname' => 'Puthireach' ,
        //     'lastname' => 'KONGCHAN' ,
        //     'email' => 'kongchanputhireach@gmail.com' ,
        //     'active' => 1 ,
        //     'password' => bcrypt('1234567890+1') ,
        //     'phone' => '012557200' ,
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

        // $this->call(MeetingsTableSeeder::class);
        // $this->call(MeetingRoomsTableSeeder::class);
        // $this->call(MeetingOrganizationsTableSeeder::class);
        // $this->call(MeetingMembersTableSeeder::class);
        // $this->call(MeetingAttendantsTableSeeder::class);

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
        

        /**
         * Seed all the Seeder files that are in the seeds folder
         */
        // $this->seeding();

        if( env('DB_CONNECTION','mysql') == 'pgsql' ){            
            $this->resetIncrement();
        }
    }
    
    private function seeding(){
        // Seeding all the class available within the seeds folder
        $path = realpath($_SERVER["DOCUMENT_ROOT"]) . '/database/seeds' ;
        foreach( scandir( $path ) AS $index => $file ){
            if( str_contains( $file , '.php' ) && $file != 'DatabaseSeeder.php' ) {
                // if( $index <= 288 ) continue ;
                echo $index . ": Seeding : " . $file . PHP_EOL;
                $this->call( str_replace( '.php', '' , $file ) );    
            }
        }
    }
    
    private function resetIncrement(){
        /**
         * Restart all tables with new incremental
         */
        $schemaSequences = \DB::select( 
            \DB::raw("
                SELECT sequence_name, sequence_schema
                FROM information_schema.sequences 
                ORDER BY sequence_schema
            ")
        );
        foreach( $schemaSequences as $index => $schemaSequence ){
            // $sequence = \DB::select(
            //     \DB::raw('SELECT last_value FROM '.$schemaSequence->sequence_name.';')
            // );
            $tableName = str_replace( 
                '_id_seq' , 
                '' , 
                // clear all the number
                preg_replace( "/[0-9]/" , '' , $schemaSequence->sequence_name )
            ) ;
            if (Schema::hasTable( $tableName ) ) {
                if( !in_array( $tableName , [ 
                    'migrations' , 'oauth_clients' , 'oauth_access_tokens' , 'oauth_auth_codes' , 'oauth_clients' , 'oauth_personal_access_clientsoauth_refresh_tokens'
                ]) ){
                    \DB::statement("SELECT SETVAL( '".$schemaSequence->sequence_name."' , (SELECT MAX(id) FROM ". $tableName .") , true );");
                    echo $index . " : SET SEQUENCE VALUE TO '" . $schemaSequence->sequence_name . PHP_EOL;
                }
            }else{
                echo "THERE IS NO SCHEMA NAME : " . $tableName . PHP_EOL;
            }
        }
    }
    
    private function seedingAllTablesWhichHasRecords(){
        echo "START SEEDING ..." . PHP_EOL;
        /**
         * Seeding all the tables
         */
        $schemas = array_filter( DB::select( 
            \DB::raw(" SELECT table_name FROM information_schema.tables WHERE table_schema='public' ORDER BY table_name ; ")
        ) , function($table){
            if( \DB::table( $table->table_name )->count() 
                && !in_array( $table->table_name , [ 
                    'migrations' , 'oauth_clients' , 'oauth_access_tokens' , 'oauth_auth_codes' , 'oauth_clients' , 'oauth_personal_access_clientsoauth_refresh_tokens'
                ])
            ){
                echo "SEEDING : " . $table->table_name . PHP_EOL ;
                Artisan::call('iseed',['tables'=>$table->table_name]);
                return $table->table_name ;
            }
            return false ;
        } );
        echo "FINISH SEEDING ..." . PHP_EOL;
    }
}
