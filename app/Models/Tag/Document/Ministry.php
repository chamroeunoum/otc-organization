<?php

namespace App\Models\Tag\Document;
use App\Models\Tag\Tag;

/**
 * This class is use to identify the ministry of the document
 */
class Ministry extends Tag
{
    public function __construct(){
        parent::__construct(get_class($this));
    }
}
