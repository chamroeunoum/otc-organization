<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'types';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','format','color','document_index'];
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

    public function documentsBySpecificYear($year=false){
      return $this->hasMany('App\Models\Document','document_type','id')->whereYear('document_year', ( $year === false ? \Carbon\Carbon::now()->format('Y') : $year ) );
    }
    public function documentsBySpecificTypeYear($type,$year=false){
      return $this->hasMany('App\Models\Document','document_type','id')
      ->where('document_type',$type)
      ->whereYear('document_year', ( $year === false ? \Carbon\Carbon::now()->format('Y') : $year ) );
    }


    public function documents(){
      return $this->hasMany('App\Models\Document','document_type','id');
    }

    /*
      The 1-1 relationship is the relation between two tables which one table is required another table's information to fullfil its information
      To define 1-1 relationship.
        we suppose that a document has only one type
        then we define a function with the method 'hasOne' with 3 parameters
            Function: hasOne( param1, param2, param3 )
            Param1 : must be a related model of the current class
            Param2 : must be a primary field of the related model
            Param3 : must be a forien field of the related field
    */
    public function document(){
      return $this->belongsTo('App\Models\Document','document_type','id');
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
