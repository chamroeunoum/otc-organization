<?php

namespace App\Models\Regulator\Tag;
use App\Models\Regulator\Tag\Tag;
use App\Models\Meeting\Meeting;
use App\Models\Meeting\MeetingOrganization;

/**
 * This class is use to identify the organization of the regulator
 */
class Organization extends Tag
{
    // protected $guarded = ['id'];
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationship
     */
    public function childNodes(){
        return $this->hasMany('\App\Models\Regulator\Tag\Organization','pid','id');
    }
    public function parentNode(){
        return $this->hasOne('\App\Models\Regulator\Tag\Organization','id','pid');
    }
    /**
     * Organization
     */
    public function regulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','organization_regulators','organization_id','regulator_id');
    }
    public function staffs(){
        return $this->belongsToMany('\App\Models\People\People','organization_people','organization_id','people_id');
    }
    public function leader(){
        return $this->belongsToMany('\App\Models\People\People','organization_leader','organization_id','people_id');
    }
    public function meetings(){
        return $this->belongsToMany( Meeting::class , MeetingOrganization::class , 'organization_id' , 'meeting_id' );
    }
}
