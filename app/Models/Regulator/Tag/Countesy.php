<?php

namespace App\Models\Regulator\Tag;
use App\Models\Regulator\Tag\Tag;

/**
 * This class is use to identify the type of the regulator
 */
class Countesy extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationships
     */
    public function people(){
        return $this->belongsToMany('\App\Models\People\People','people_countesies','countesy_id','people_id');
    }
}
