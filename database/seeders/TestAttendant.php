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
        \App\Models\User::all()->map(function($user){
            $start = \Carbon\Carbon::parse('2022-01-01');
            $end = \Carbon\Carbon::parse('2023-12-31');
            $attendantsOfTheDay = [] ;
            do{
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . PHP_EOL ;    

                $attendant = \App\Models\Attendant\Attendant::create([
                    'user_id' => $user->id ,
                    'date' => $start ,
                    'worked_hours' => 0.0 ,
                    'worked_minutes' => 0.0 ,
                    'ot_hours' => 0.0 ,
                    'ot_minutes' => 0.0 ,
                    'attendant_type' => 'P' ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);

                $morningTimeslot = \App\Models\Attendant\Timeslot::where('title','Morning')->first();
                $eveningTimeslot = \App\Models\Attendant\Timeslot::where('title','Evening')->first();
                $nightTimeslot = \App\Models\Attendant\Timeslot::where('title','Night')->first();
                
                $attendant->timeslots()->sync([$morningTimeslot->id]);
                $attendant->timeslots()->sync([$eveningTimeslot->id]);
                $user->timeslots()->sync([ $morningTimeslot->id , $eveningTimeslot->id ]);
                /**
                 * Create attendant check time morning check in
                 */
                $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $morningTimeslot->start );
                // Adjust some minutes of the checktime
                rand(0,10) % 2
                    // Come Early
                    ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                    // Come Late
                    : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => MORNING CHECK IN : " . $checktime->format('H:i') . PHP_EOL;
                $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                    'attendant_id' => $attendant->id ,
                    'timeslot_id' => $morningTimeslot->id ,
                    'date'=> $start ,
                    'checktime' => $checktime->format('H:i') ,
                    'checktype' => 'AfterLogin' ,
                    'meta' => 'Browser' ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);

                /**
                 * Create attendant check time morning check out
                 */
                $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $morningTimeslot->end );
                // Adjust some minutes of the checktime
                rand(0,10) % 2
                    // Stay Late
                    ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                    // Leave Early
                    : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => MORNING CHECK OUT : " . $checktime->format('H:i') . PHP_EOL;
                $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                    'attendant_id' => $attendant->id ,
                    'timeslot_id' => $morningTimeslot->id ,
                    'date'=> $start ,
                    'checktime' => $checktime->format('H:i') ,
                    'checktype' => 'AfterLogin' ,
                    'meta' => 'Browser' ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);

                /**
                 * Create attendant check time evening check in
                 */
                $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $eveningTimeslot->start );
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => EVENING CHECK IN : " . $checktime->format('H:i') . PHP_EOL;
                // Adjust some minutes of the checktime
                rand(0,10) % 2
                    // Come Early
                    ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                    // Come Late
                    : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                    'attendant_id' => $attendant->id ,
                    'timeslot_id' => $eveningTimeslot->id ,
                    'date'=> $start ,
                    'checktime' => $checktime->format('H:i') ,
                    'checktype' => 'AfterLogin' ,
                    'meta' => 'Browser' ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);

                /**
                 * Create attendant check time evening check out
                 */
                $checktime = \Carbon\Carbon::parse( $start->format("Y-m-d") . ' ' . $eveningTimeslot->end );
                // Adjust some minutes of the checktime
                rand(0,10) % 2
                    // Stay Late
                    ? $checktime->addMinutes( rand(5,10) * rand(1,4) )
                    // Leave Early
                    : $checktime->subMinutes( rand(5,10) * rand(1,4) );
                echo "USER : " . $user->id . " => DAY : " . $start->format('Y-m-d') . " => EVENING CHECK OUT : " . $checktime->format('H:i') . PHP_EOL;
                $attendantCheckTime = \App\Models\Attendant\AttendantCheckTime::create([
                    'attendant_id' => $attendant->id ,
                    'timeslot_id' => $eveningTimeslot->id ,
                    'date'=> $start ,
                    'checktime' => $checktime->format('H:i') ,
                    'checktype' => 'AfterLogin' ,
                    'meta' => 'Browser' ,
                    'created_at' => Carbon::now() ,
                    'updated_at' => Carbon::now()
                ]);
                $start->addDay();
            }while( $start->lte( $end ) );
            \DB::table('attendants')->insert( $attendantsOfTheDay );
            echo "INSERT INTO TABLE";
        });

    }
}
