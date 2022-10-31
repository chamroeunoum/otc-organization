<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentMinistry extends Model
{

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'document_ministries';

    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getDocuments(){
        return $this->select('document_id')->where("ministry_id",$this->ministry_id)->pluck('document_id');
    }
    public function getMinistries(){
        return $this->select('ministry_id')->where("document_id",$this->document_id)->pluck('ministry_id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }

    public function ministry()
    {
        return $this->belongsTo('App\Models\Ministry', 'ministry_id');
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
