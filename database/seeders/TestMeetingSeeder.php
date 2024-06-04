<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon ;
use Faker\Generator as Faker;
use PDF;

class TestMeetingSeeder extends Seeder
{
    private $tables = [
        'users' , 'meetings' , 'attendants' , 'meeting_members' , 'meeting_organizations' , 'meeting_attendants' ,
        'meeting_rooms'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if( env('DB_CONNECTION', '') == 'pgsql' ){
            array_map(
                function( $table ){
                    echo 'RUN INDEXING ' . strtoupper( $table ) . PHP_EOL;
                    \DB::statement("SELECT setval('". $table ."_id_seq', (SELECT MAX(id) FROM ". $table ." )+1);");
                }
                ,$this->tables
            );
        }

        /**
         * Create users to create a meeting
         */
        \App\Models\User::all()->map(function($user) use( $faker ){
            // Random the number of the meeting for each user
            // $totalMeetings = rand(0,50) ;
            $totalMeetings = 5;
            $start = 0;
            do{
                $this->createMeetings($user, $faker);
                $start++;
            }while( $start < $totalMeetings);
        });
        
        if( env('DB_CONNECTION', '') == 'pgsql' ){
            array_map(
                function( $table ){
                    echo 'RUN INDEXING ' . strtoupper( $table ) . PHP_EOL;
                    \DB::statement("SELECT setval('". $table ."_id_seq', (SELECT MAX(id) FROM ". $table ." )+1);");
                }
                ,$this->tables
            );
        }
        
    }
    private function createMeetings($user, $faker){
        /**
         * Create meetings
         */
        $start = ['8:00','8:30','9:00','9:30','10:00','14:00','14:30','15:00','15:30'];
        $end = ['10:00','10:30','11:00','11:30','12:00','16:00','16:30','17:00','17:30'];
        $timeIndex = rand(0,8);

        $date = ( rand(0,1) % 2 ) ? Carbon::now()->subMonths(rand(1,12)) : Carbon::now()->addMonths( rand(0,3) );

        $startDate = $date->copy();
        $startDate->hour = explode(":", $start[ $timeIndex ] )[0] ;
        $startDate->minute = explode(":", $start[ $timeIndex ] )[1] ;

        $endDate = $date->copy();
        $endDate->hour = explode(":", $end[ $timeIndex ] )[0] ;
        $endDate->minute = explode(":", $end[ $timeIndex ] )[1] ;

        $table->increments('id');
        $table->integer('regulator_id')->nullable(true)->comment('The regulator that publish by this legal draft');
        $table->string('title', 191 )->nullable(true)->comment('The title of the draft');
        $table->text('objective')->comment('The objective of the draft');
        $table->text('files')->nullable(true)->comment('The links of the files');
        $table->longText('content')->comment('The whole content of the draft');
        $table->integer('created_by')->comment('The creator of the file');
        $table->integer('updated_by')->comment('The creator of the file');
        $table->integer('deleted_by')->nullable(true)->comment('The creator of the file');
        $table->integer('status')->default(0)->comment('The status of the legal draft, 0 : NEW , 1 : PROGRESSING , 2 : FINISHED');
        $table->integer('pid')->default(0)->comment('The id of the parent legal draft.');
        
        $legalDraft = ( rand(0,1) % 2 ) 
            ? // Legal draft
            \App\Models\Regulator\LegalDraft::create([
                'title' => '' ,
                'objective' => '' , 
                'content' => '' ,
                'created_by' => $user->id ,
                'updated_by' => $user->id ,
                'status' => 0
            ])
            : \App\Models\Regulator\LegalDraft::inRandomOrder()->first();

        $meeting = \App\Models\Meeting\Meeting::create([
            'objective' => $legalDraft->objective ,
            'date' => $date->format('Y-m-d') ,
            'start' => $start[$timeIndex] ,
            'end' => $end[$timeIndex] ,
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
        $meeting->listMembers->each(function($meetingMember){
            // Assign member into Audien Group
            $meetingMember->group = 'audient' ;
            // Set user as role of the audient
            $meetingMember->role = 'member' ;
            $meetingMember->save();
        });
        // Assign member into the Leading group
        // Set user as leader of the meeting
        $meetingLeader = $meeting->listMembers->shuffle()->first() ;
        $meetingLeader->group = 'lead_meeting' ;
        $meetingLeader->role = 'leader' ;
        $meetingLeader->save();
        // Set user as coordinate leader of the meeting
        $meetingCoordinateLeader = $meeting->listMembers->shuffle()->first() ;
        $meetingCoordinateLeader->group = 'lead_meeting' ;
        $meetingCoordinateLeader->role = 'deputy_leader' ;
        $meetingCoordinateLeader->save();
        
        // Assign member into the defend group
        // Set user as leader of the meeting defender
        $meetingLeader = $meeting->listMembers->shuffle()->first() ;
        $meetingLeader->group = 'defender' ;
        $meetingLeader->role = 'leader' ;
        $meetingLeader->save();
        // Set user as coordinate leader of the meeting defender
        $meetingCoordinateLeader = $meeting->listMembers->shuffle()->first() ;
        $meetingCoordinateLeader->group = 'defender' ;
        $meetingCoordinateLeader->role = 'deputy_leader' ;
        $meetingCoordinateLeader->save();

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
        $meeting->status = $date->gt( \Carbon\Carbon::now() ) ? 0 : ( rand(0,20) % 2 ? 16 : 8 );
        $meeting->save();
        echo "Meeting : " . $user->id . ' : ' . $user->lastname . ' ' . $user->firstname . ' => ' . $meeting->date . ' , ' . $meeting->start . ' => ' . $meeting->end . " => " . $meeting->type->name . PHP_EOL;
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
