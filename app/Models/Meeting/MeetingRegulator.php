<?php

namespace App\Models\Meeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRegulator extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    public function regulator(){
        return $this->belongsTo( \App\Models\Regulator\Regulator::class , 'regulator_id' , 'id' );
    }

    public function meeting(){
        return $this->belongsTo( \App\Models\Meeting\Meeting::class , 'meeting_id' , 'id' );
    }
}
