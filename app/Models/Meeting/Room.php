<?php

namespace App\Models\Meeting;
use App\Models\Regulator\Tag\Tag;

/**
 * This class is use to identify the type of the regulator
 */
class Room extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationship
     */
    public function childNodes(){
        return $this->hasMany('\App\Models\Meeting\Room','pid','id');
    }
    public function meetingRooms(){
        return $this->hasMany('\App\Models\Meeting\MeetingRoom','room_id','id');
    }
}
