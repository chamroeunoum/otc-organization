<?php

namespace App\Models\Regulator\Tag;
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
     * Relationships
     */
    public function regulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','regulator_types','type_id','regulator_id');
    }
}
