<?php

namespace App\Models\Attendant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use \Carbon\Carbon as Carbon;

class Attendant extends Model
{
    use HasFactory, SoftDeletes ;

    protected $guarded = ['id'] ;

    const ATTENDANT_ABSENT = "A" , ATTENDANT_ANNUAL_LEAVE = "AL" , ATTENDANT_SICK_LEAVE = "SL" , ATTENDANT_PRESENT = "P" , ATTENDANT_PRESENT_EARLY = "PE" , ATTENDANT_PRESENT_LATE = "PL" , ATTENDANT_PERMISSION = "PM" , ATTENDANT_MATERNITY_LEAVE = "ML" , ATTENDANT_OTHER_LEAVE = "OL" ;
    const ATTENDANT_TYPES = [ "A" , "AL" , "SL" , "P" , "PE" , "PL" , "PM" , "ML" , "OL" ] ;
    const ATTENDANT_CHECK_STATUS = [ "IN" , "OUT" ] ;
    
    public function userTimeslot(){
        return $this->belongsTo(\App\Models\Attendant\UserTimeslot::class,'user_timeslot_id','id');
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }
    public function checktimes(){
        return $this->hasMany( \App\Models\Attendant\AttendantCheckTime::class , 'attendant_id' , 'id' );
    }
    /**
     * Update the working time in minutes into attendant
     */
    public function updateWorkingMinutes(){
        $attendantCalculation = $this->calculateWorkingTime();
        $this->late_or_early = $attendantCalculation['total']['lateOrEarly'];
        $this->worked_time = $attendantCalculation['total']['workedTime'];
        // $this->overtime = $attendantCalculation['total']['overtime'];
        $this->duration = $attendantCalculation['total']['duration'];
        $this->save();
    }
    /**
     * Calculate the working hour within the responseible timeslots
     */
    public function calculateWorkingTime(){
        $userTimeslots = $this->user->totalActualWorkingHoursOfTimeslots();
        $total = [
            'timeslots' => [] ,
            'checkingIn' => 0 , 
            'checkingOut' => 0 ,
            'lateOrEarly' => 0 , 
            'workedTime' => 0 ,
            'duration' => $userTimeslots->sum('minutes') - $userTimeslots->sum('rest_duration') ,
            'overtime' => 0 
        ] ;
        $checkTimes = $this->checktimes()->where('check_status',\App\Models\Attendant\AttendantChecktime::CHECK_STATUS_IN)->get()->map(function($checkin) use( &$total ){
            $checkout = $checkin
            ->checkout
            // ->where([
            //     'timeslot_id'=> $checkin->timeslot_id ,
            //     'attendant_id'=> $checkin->attendant_id ,
            //     'check_status'=> \App\Models\Attendant\AttendantChecktime::CHECK_STATUS_OUT
            // ])->first()
            ;
            $calculateTime = $checkin->timeslot->calculateChecktime($checkin,$checkout,$this->date);
            $total['timeslots'][] = [
                'id' => $checkin->timeslot->id ,
                'title'  => $checkin->timeslot->title ,
                'start' => $checkin->timeslot->start ,
                'end' => $checkin->timeslot->end ,
                'effective_day' => $checkin->timeslot->effective_day
            ];
            $total['checkingIn'] += $calculateTime['checkingIn'];
            $total['checkingOut'] += $calculateTime['checkingOut'];
            $total['lateOrEarly'] += $calculateTime['lateOrEarly'];
            $total['workedTime'] += $calculateTime['workedTime'];
            return $calculateTime ;
        });
        $total['overtime'] = $total['lateOrEarly'] > 0 ? $total['lateOrEarly'] : 0 ;
        return [
            'checktimes' => $checkTimes ,
            'isSunday' => $this->isSunday() ,
            'isHoliday' => $this->isHoliday() ,
            'total' => $total ,
        ];
    }
    /**
     * Check whether this date is the sunday
     */
    public function isSunday(){
        return $this->date != null ? Carbon::parse( $this->date )->isSunday() : false ;
    }
    /**
     * Check whether this date is holiday
     */
    public function isHoliday(){
        return false ;
        // return $this->date != null ? Carbon::parse( $this->date )->isSunday() : false ;
    }

    /**
     * Attendant without specifying checkin or checkout
     */
    public function getWorkingHours(){
        $checkin = $this->checktimes()->orderby('checktime','asc')->first();
        $checkout = $this->checktimes()->orderby('checktime','desc')->first();
        $this->userTimeslot == null ? null
            : $this->userTimeslot->search(function( $userTimeslot, $key ) use( $checkin, $checkout){
                \Carbon\Carbon::parse( $userTimeslot->start ) ;
                // return $userTimeslot->
            });
    }
}
