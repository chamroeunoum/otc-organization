<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Seeding extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeding all the class that are available within the seeds folder excepts
        $path = realpath($_SERVER["DOCUMENT_ROOT"]) . '/database/seeds' ;
        foreach( scandir( $path ) AS $index => $file ){
            if( str_contains( $file , '.php' ) 
                && !in_array( $file , [ 
                    'DatabaseSeeder' , 'RunSeeder' , 'GenerateSeeder'
                ]) ) {
                // if( $index <= 288 ) continue ;
                echo $index . ": Seeding : " . $file . PHP_EOL;
                $this->call( str_replace( '.php', '' , $file ) );    
            }
        }
    }
}
