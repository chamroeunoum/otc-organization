<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentParent extends Model
{

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'document_parents';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['parent_id','document_parent_id', 'document_id','amend','created_at','updated_at','desc','name','image'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function document(){
        return $this->belongsTo('App\Models\Document','document_id','id');
    }
    public function parentDocument(){
        return $this->belongsTo('App\Models\Document','document_parent_id','id');
    }
    public function parentRecord(){
        return $this->belongsTo('App\Models\DocumentParent','parent_id','id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
