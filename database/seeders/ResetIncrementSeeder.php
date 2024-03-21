<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ResetIncrementSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Restart all tables with new incremental
         */
        $schemaSequences = DB::select( 
            DB::raw("
                SELECT sequence_name, sequence_schema
                FROM information_schema.sequences 
                ORDER BY sequence_schema
            ")
        );
        foreach( $schemaSequences as $index => $schemaSequence ){
            // $sequence = DB::select(
            //     DB::raw('SELECT last_value FROM '.$schemaSequence->sequence_name.';')
            // );
            if( !in_array( str_replace( '_id_seq' , '' , $schemaSequence->sequence_name ) , [ 
                'migrations' , 'oauth_clients' , 'oauth_access_tokens' , 'oauth_auth_codes' , 'oauth_clients' , 'oauth_personal_access_clientsoauth_refresh_tokens'
            ]) ){
                // DB::statement('ALTER SEQUENCE '.$schemaSequence->sequence_name.' RESTART WITH '.($sequence[0]->last_value).';');
                DB::statement("SELECT SETVAL( '".$schemaSequence->sequence_name."' , (SELECT MAX(id) FROM ".str_replace('_id_seq','',$schemaSequence->sequence_name).") , true );");
                echo $index . " : SET SEQUENCE VALUE TO '" . $schemaSequence->sequence_name . PHP_EOL;
            }
        }   
    }
}
