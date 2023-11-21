<?php

namespace App\Models\Attendant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendantTimeslot extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function attendant(){
        return $this->belongsTo( \App\Models\Attendant\Attendant::class , 'attendant_id', 'id' );
    }
    public function timeslot(){
        return $this->belongsTo( \App\Models\Attendant\Timeslot::class , 'timeslot_id' , 'id' );
    }

}
