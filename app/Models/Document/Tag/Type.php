<?php

namespace App\Models\Document\Tag;
use App\Models\Document\Tag\Tag;

/**
 * This class is use to identify the type of the document
 */
class Type extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
    /**
     * Relationships
     */
    public function documents(){
        return $this->belongsToMany('\App\Models\Document\Document','document_types','type_id','document_id');
    }
}
