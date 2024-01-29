<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon ;
use Faker\Generator as Faker;
use PDF;

class MeetingTestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /**
         * Create users to create a meeting
         */
        // $user = \App\Models\User::where('id','<',42)->inRandomOrder()->first(); 
        $user = \App\Models\User::where('email','chamroeunoum@gmail.com')->first(); 

        for($i=0;$i<=8;$i++){
            /**
             * Create meetings
             */
            $date = Carbon::now() ;
            $start = ['8:00','8:30','9:00','9:30','10:00','14:00','14:30','15:00','15:30'];
            $end = ['10:00','10:30','11:00','11:30','12:00','16:00','16:30','17:00','17:30'];
            $meeting = \App\Models\Meeting\Meeting::create([
                'objective' => $faker->paragraph() ,
                'date' => \Carbon\Carbon::now() ,
                'start' => $start[$i] ,
                'end' => $end[$i] ,
                'status' => 0 ,
                /**
                 * Meeting Type
                 */
                'type_id' => \App\Models\Meeting\Type::where('pid',552)->inRandomOrder()->first()->id ,
                'created_by' => $user->id ,
                'updated_by' => $user->id
            ]);

            /**
             * Meeting Status
             */

            // $table->integer('status')->default()->comment('0 => New, 1 => Meeting, 2 => Continue , 4 => Change , 8 => Delayed , 16 => Finished ');

            $fileName = $this->generatePDF($user,'PRENG');
            $meeting->seichdey_preeng = array_merge( is_array( $meeting->seichdey_preeng ) ? $meeting->seichdey_preeng : [] , [[ 'name' => $fileName , 'serial' => $fileName ]] );

            $fileName = $this->generatePDF($user,'REPORTS');
            $meeting->reports = array_merge( is_array( $meeting->reports ) ? $meeting->reports : [] , [[ 'name' => $fileName , 'serial' => $fileName ]] );

            $fileName = $this->generatePDF($user,'REFERENCE DOCUMENTS');
            $meeting->other_documents = array_merge( is_array( $meeting->other_documents ) ? $meeting->other_documents : [] , [[ 'name' => $fileName , 'serial' => $fileName ]] );

            $meeting->save();

            /**
             * Add regulator to the meeting
             */
            $meeting->regulators()->toggle( \App\Models\Regulator\Regulator::inRandomOrder()->limit(5)->get()->pluck('id') );
            /**
             * Add members to the meeting
             */
            $meeting->members()->toggle( \App\Models\People\People::inRandomOrder()->limit(20)->get()->pluck('id') );
            /**
             * Add organizations to the meeting
             */
            $meeting->organizations()->toggle( \App\Models\Regulator\Tag\Organization::where('pid',163)->inRandomOrder()->limit(5)->get()->pluck('id') );
            /**
             * Add Room to the meeting
             */
            $meeting->rooms()->toggle( \App\Models\Meeting\Room::where('pid',547)->inRandomOrder()->limit(1)->get()->pluck('id') );
            
            /**
             * Check attendant of the meeting
             */
            $meeting->listMembers->map(function($meetingMember){
                list($hour,$minutes) = explode(":",$meetingMember->meeting->start);
                $minuteAdjustment = ( rand(1,6) * 5 ) * [-1,1][rand(0,1)];
                $meetingMember->attendant()->create([
                    'people_id' => \App\Models\People\People::inRandomOrder()->first()->id ,
                    'checktime' => $hour . ":" . ( $minutes > 0 ? ( $minutes + $minuteAdjustment ) : $minutes )
                ]);
            });
            /**
             * Finish the meeting
             */
            $meeting->status = rand(0,20) % 2 ? 16 : 8 ;
        }
        

        if( env('DB_CONNECTION', '') == 'pgsql' ){
            echo 'RUN INDEXING OF MATRA ' . PHP_EOL;
            \DB::statement("SELECT setval('matras_id_seq', (SELECT MAX(id) FROM matras )+1);");
        }
        
    }
    private function generatePDF($owner, $content){
        $hashFileName = Str::random(32).'.pdf' ;
        
        /**
         * Create folder
         */
        if( !file_exists( storage_path('data') . '/meetings/' . $owner->id ) ){
            mkdir( storage_path('data') . '/meetings/' . $owner->id );
        }
        // Use pdf with App container
        // Load custom html code as pdf
        PDF::loadHTML("
            <html>
                <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
                <style>
                    .page-break {
                        page-break-after: always;
                    }
                </head>
                <body>
                    ". $content ."
                    <div class='page-break'></div>
                    ទំព័រ ទទេ។
                </body>
            </html>
        ")
        // Download pdf
        // ->download('invoice.pdf')
        // Save pdf to file
        ->save( storage_path('data') . '/meetings/' . $owner->id . '/' . $hashFileName )
        // Stream pdf file
        // ->stream('download.pdf')
        ;
        return [ 'name' => $hashFileName , 'serial' => $owner->id . '/' . $hashFileName ] ;
    }
}
