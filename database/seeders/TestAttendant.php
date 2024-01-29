<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class TestAttendant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Get all the users/staffs
        echo "START GENERATE ATTENDANT CHECK TIME" . PHP_EOL ;
        \App\Models\User::where('id','<=',40)->orderby('id','asc')->get()->map(function($user){

            /**
             * Assign timeslots to user
             */
            $allTimeslots = \App\Models\Attendant\Timeslot::where('id','<',3)->get()->pluck('id');
            $user->timeslots()->sync( $allTimeslots );

            $start = \Carbon\Carbon::parse('2015-01-01');
            $end = \Carbon\Carbon::parse('2023-12-13');
            $attendantsOfTheDay = [] ;
            do{
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . PHP_EOL ;    

                $attendant = \App\Models\Attendant\Attendant::create([
                    'user_id' => $user->id ,
                    'date' => $start ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);

                $user->userTimeslots->map(function( $userTimeslot ) use( $start , $end , $user, $attendant ){
                    /**
                     * Create attendant check time morning check in
                     */
                    $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $userTimeslot->timeslot->start );
                    // Adjust some minutes of the checktime
                    rand(0,10) % 2
                        // Come Early
                        ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                        // Come Late
                        : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                    echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => " . $userTimeslot->timeslot->title . " CHECK IN : " . $checktime->format('H:i') . PHP_EOL;
                    $attendantCheckTimeIn = \App\Models\Attendant\AttendantCheckTime::create([
                        'attendant_id' => $attendant->id ,
                        'timeslot_id' => $userTimeslot->timeslot_id ,
                        'checktime' => $checktime->format('H:i') ,
                        'checktype' => \App\Models\Attendant\AttendantCheckTime::CHECK_TYPE_DEFAULT ,
                        'check_status' => \App\Models\Attendant\AttendantCheckTime::CHECK_STATUS_IN ,
                        'meta' => 'Browser' ,
                        'created_at' => Carbon::now() ,
                        'updated_at' => Carbon::now()
                    ]);
    
                    /**
                     * Create attendant check time morning check out
                     */
                    $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $userTimeslot->timeslot->end );
                    // Adjust some minutes of the checktime
                    rand(0,10) % 2
                        // Stay Late
                        ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                        // Leave Early
                        : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                    echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => " . $userTimeslot->timeslot->title . " CHECK OUT : " . $checktime->format('H:i') . PHP_EOL;
                    $attendantCheckTimeOut = \App\Models\Attendant\AttendantCheckTime::create([
                        'attendant_id' => $attendant->id ,
                        'timeslot_id' => $userTimeslot->timeslot_id ,
                        'checktime' => $checktime->format('H:i') ,
                        'checktype' => \App\Models\Attendant\AttendantCheckTime::CHECK_TYPE_DEFAULT ,
                        'check_status' => \App\Models\Attendant\AttendantCheckTime::CHECK_STATUS_OUT ,
                        'parent_checktime_id' => $attendantCheckTimeIn->id ,
                        'meta' => 'Browser' ,
                        'created_at' => Carbon::now() ,
                        'updated_at' => Carbon::now()
                    ]);
                });
                $attendant->updateWorkingMinutes();
                /**
                 * Create attendant check time evening check in
                 */
                // $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $eveningTimeslot->start );
                // echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => EVENING CHECK IN : " . $checktime->format('H:i') . PHP_EOL;
                // // Adjust some minutes of the checktime
                // rand(0,10) % 2
                //     // Come Early
                //     ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                //     // Come Late
                //     : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                // $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                //     'attendant_id' => $attendant->id ,
                //     'timeslot_id' => $eveningTimeslot->id ,
                //     'date'=> $start ,
                //     'checktime' => $checktime->format('H:i') ,
                //     'checktype' => 'AfterLogin' ,
                //     'meta' => 'Browser' ,
                //     'created_at' => Carbon::now() ,
                //     'updated_at' => Carbon::now()
                // ]);

                /**
                 * Create attendant check time evening check out
                 */
                // $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $eveningTimeslot->end );
                // // Adjust some minutes of the checktime
                // rand(0,10) % 2
                //     // Stay Late
                //     ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                //     // Leave Early
                //     : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                // echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => EVENING CHECK OUT : " . $checktime->format('H:i') . PHP_EOL;
                // $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                //     'attendant_id' => $attendant->id ,
                //     'timeslot_id' => $eveningTimeslot->id ,
                //     'date'=> $start ,
                //     'checktime' => $checktime->format('H:i') ,
                //     'checktype' => 'AfterLogin' ,
                //     'meta' => 'Browser' ,
                //     'created_at' => Carbon::now() ,
                //     'updated_at' => Carbon::now()
                // ]);

                $start->addDay();
            }while( $start->lte( $end ) );
            \DB::table('attendants')->insert( $attendantsOfTheDay );
            echo "INSERT INTO TABLE";
        });

    }
}
