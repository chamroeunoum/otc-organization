<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Create role for the user
         */
        $super = \App\Models\Role::create(['name' => 'super', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $administrator = \App\Models\Role::create(['name' => 'admin', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $backendMember = \App\Models\Role::create(['name' => 'backend', 'guard_name' => 'api' , 'tag' => 'core_service']);
        $client = \App\Models\Role::create(['name' => 'client', 'guard_name' => 'api' , 'tag' => 'client_service']);

        /**
         * Create accounts
         */
        /**
         * Create admin user for development purpose
         */
        $superuser = \App\Models\User::create([
            'firstname' => 'User' ,
            'lastname' => 'Super' ,
            'email' => 'super@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '012391848' ,
            'username' => 'superuser'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $superuser->firstname , 
            'lastname' => $superuser->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $superuser->phone , 
            'email' => $superuser->email
        ]);
        $superuser->people_id = $people->id ;
        $superuser->save();
        $superuser->assignRole( $super );

        /**
         * Create admin user for development purpose
         */
        $adminuser = \App\Models\User::create([
            'firstname' => 'User' ,
            'lastname' => 'Admin' ,
            'email' => 'admin@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('031884Chamroeunoum') ,
            'phone' => '017391848' ,
            'username' => 'adminuser'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $adminuser->firstname , 
            'lastname' => $adminuser->lastname , 
            'gender' => 1 , // Male
            'dob' => \Carbon\Carbon::parse('1983-02-23 9:00') ,
            'mobile_phone' => $adminuser->phone , 
            'email' => $adminuser->email
        ]);
        $adminuser->people_id = $people->id ;
        $adminuser->save();
        $adminuser->assignRole( $administrator );

        /**
         * Create client user for development purpose
         */
        $backenduser = \App\Models\User::create([
            'firstname' => 'User' ,
            'lastname' => 'Backend' ,
            'email' => 'backend@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => '012557200' ,
            'username' => 'backenduser'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $backenduser->firstname , 
            'lastname' => $backenduser->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $backenduser->phone , 
            'email' => $backenduser->email
        ]);
        $backenduser->people_id = $people->id ;
        $backenduser->save();
        $backenduser->assignRole( $backendMember );

        /**
         * Create client user for development purpose
         */
        $clientuser = \App\Models\User::create([
            'firstname' => 'User' ,
            'lastname' => 'Client' ,
            'email' => 'client@gmail.com' ,
            'active' => 1 ,
            'password' => bcrypt('1234567890+1') ,
            'phone' => '010517515' ,
            'username' => 'clientuser'
        ]);
        
        $people = \App\Models\People\People::create([
            'firstname' => $clientuser->firstname , 
            'lastname' => $clientuser->lastname , 
            'gender' => 0 , // Male
            'dob' => \Carbon\Carbon::parse('1984-03-18 9:00') ,
            'mobile_phone' => $clientuser->phone , 
            'email' => $clientuser->email
        ]);
        $clientuser->people_id = $people->id ;
        $clientuser->save();
        $clientuser->assignRole( $client );

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
        $schemaSequences = 
        // \DB::select( 
        //     \DB::raw("
        //         SELECT sequence_name, sequence_schema
        //         FROM information_schema.sequences 
        //         ORDER BY sequence_schema
        //     ")
        // );
        \DB::table('information_schema.sequences')->select( 
            \DB::raw("sequence_name, sequence_schema")
        )->orderBy('sequence_schema' , 'asc' )
        ->get();
        
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
