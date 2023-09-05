<?php

namespace App\Models\Document\Tag;
use App\Models\Document\Tag\Tag;

/**
 * This class is use to identify the ministry of the document
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
    public function documents(){
        return $this->belongsToMany('\App\Models\Document\Document','organization_documents','organization_id','document_id');
    }
    public function staffs(){
        return $this->belongsToMany('\App\Models\User','organization_staffs','organization_id','user_id');
    }
    public function childNodes(){
        return $this->hasMany('\App\Models\Document\Tag\Organization','pid','id');
    }
    public function parentNode(){
        return $this->hasOne('\App\Models\Document\Tag\Organization','id','pid');
    }
}
