<?php

namespace App\Models\Attendant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendantCheckTime extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function attendant(){
        return $this->belongsTo( \App\Models\Attendant\Attendant::class , 'attendant_id' , 'id' );
    }
    public function timeslot(){
        return $this->belongsTo( \App\Models\Attendant\Timeslot::class , 'timeslot_id' , 'id' );
    }

    /**
     * Check whether this holiday is the sunday
     */
    public function isSunday(){
        return $this->date != null ? Carbon::parse( $this->date )->isSunday() : false ;
    }
    public function getCheckTimes(){
        return $this->where('attendant_id', $this->attendant_id)->where('date',$this->date)->where('timeslot_id',$this->timeslot_id);
    }
    public function calculateWorkingTime(){
        $checktimes = $this->getCheckTimes()->orderby('checktime','asc')->get();
        return $this->timeslot->calculateWorkingTime( $checktimes->first() , $checktimes->last() );
    }
}
