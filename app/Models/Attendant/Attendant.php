<?php

namespace App\Models\Attendant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Attendant extends Model
{
    use HasFactory;
    const ATTENDANT_ABSENT = "A" , ATTENDANT_ANNUAL_LEAVE = "AL" , ATTENDANT_SICK_LEAVE = "SL" , ATTENDANT_PRESENT = "P" , ATTENDANT_PRESENT_EARLY = "PE" , ATTENDANT_PRESENT_LATE = "PL" , ATTENDANT_PERMISSION = "PM" , ATTENDANT_MATERNITY_LEAVE = "ML" , ATTENDANT_OTHER_LEAVE = "OL" ;
    const ATTENDANT_TYPES = [ "A" , "AL" , "SL" , "P" , "PE" , "PL" , "PM" , "ML" , "OL" ] ;
    
    public function staff(){
        return $this->belongsTo( \App\Models\User::class , 'user_id' , 'id' );
    }
    public function timeslots(){
        return $this->belongsToMany( \App\Models\Attendant\Timeslot::class , 'attendant_timeslots' , 'attendant_id' , 'timeslot_id' );
    }
    public function attendantCheckTimes(){
        return $this->hasMany( \App\Models\Attendant\AttendantCheckTime::class , 'attendant_id' , 'id' );
    }
    /**
     * Get the timeslot of the checktime of date
     */
    public function getTimeslotsOfChecktimes(){
        return $this->attendantCheckTimes()->where('date',$this->date)->select('timeslot_id')->groupby('timeslot_id')->pluck('timeslot_id');
    }
    /**
     * Calculate the working hour within the responseible timeslots
     */
    public function calculateWorkingTime(){
        $total = [
            'timeslots' => [] ,
            'checkingIn' => 0 , 
            'checkingOut' => 0 ,
            'lateOrEarly' => 0 , 
            'workedTime' => 0 ,
            'duration' => 0 ,
            'overtime' => 0 
        ] ;
        $checkTimes = $this->getTimeslotsOfChecktimes()->map(function($timeslotId) use( &$total ){
            $calculateTime = $this->attendantCheckTimes->where('timeslot_id',$timeslotId)->first()->calculateWorkingTime();
            $total['timeslots'][] = $timeslotId ;
            $total['checkingIn'] += $calculateTime['checkingIn'];
            $total['checkingOut'] += $calculateTime['checkingOut'];
            $total['lateOrEarly'] += $calculateTime['lateOrEarly'];
            $total['workedTime'] += $calculateTime['workedTime'];
            $total['duration'] += $calculateTime['duration'];
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
    
}
