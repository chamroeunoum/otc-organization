<?php

namespace App\Models\Document\Tag;
use App\Models\Document\Tag\Tag;

/**
 * This class is use to identify the ministry of the document
 */
class Ministry extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
    public function documents(){
        return $this->belongsToMany('\App\Models\Document\Document','document_ministries','ministry_id','document_id');
    }
}
