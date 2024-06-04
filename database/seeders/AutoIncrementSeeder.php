<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDF;
use Illuminate\Support\Facades\Schema;

class AutoIncrementSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if( env('DB_CONNECTION','mysql') == 'pgsql' ){
            
            $this->resetIncrement();

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
    
}
