<?php

namespace App\Models\Regulator\Tag;
use App\Models\Regulator\Tag\Tag;

/**
 * This class is use to identify the organization of the regulator
 */
class Position extends Tag
{
    // protected $guarded = ['id'];
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationship
     */
    public function childNodes(){
        return $this->hasMany('\App\Models\Regulator\Tag\Position','pid','id');
    }
    public function parentNode(){
        return $this->hasOne('\App\Models\Regulator\Tag\Position','id','pid');
    }
    /**
     * Organization
     */
    public function regulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','position_regulators','position_id','regulator_id');
    }
    public function staffs(){
        return $this->belongsToMany('\App\Models\User','position_users','position_id','user_id');
    }
}
