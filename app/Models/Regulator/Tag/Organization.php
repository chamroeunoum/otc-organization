<?php

namespace App\Models\Regulator\Tag;
use App\Models\Regulator\Tag\Tag;

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
    public function organizationRegulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','organization_regulators','organization_id','regulator_id');
    }
    public function organizationStaffs(){
        return $this->belongsToMany('\App\Models\User','organization_staffs','organization_id','user_id');
    }
}
