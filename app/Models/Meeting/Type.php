<?php

namespace App\Models\Meeting;
use App\Models\Regulator\Tag\Tag;

/**
 * This class is use to identify the type of the regulator
 */
class Type extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationship
     */
    public function childNodes(){
        return $this->hasMany('\App\Models\Meeting\Type','pid','id');
    }
    public function meetings(){
        return $this->hasMany('\App\Models\Meeting\Meeting','type_id','id');
    }
}
