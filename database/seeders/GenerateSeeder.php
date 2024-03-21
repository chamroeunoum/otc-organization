<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class GenerateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "START SEEDING ..." . PHP_EOL;
        /**
         * Seeding all the tables
         */
        $schemas = array_filter( DB::select( 
            DB::raw(" SELECT table_name FROM information_schema.tables WHERE table_schema='public' ORDER BY table_name ; ")
        ) , function($table){
            if( \DB::table( $table->table_name )->count() 
                && !in_array( $table->table_name , [ 
                    'migrations' , 'oauth_clients' , 'oauth_access_tokens' 
                    , 'oauth_auth_codes' , 'oauth_clients' , 'oauth_personal_access_clientsoauth_refresh_tokens'
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
