<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Ministry;
use App\Models\Signature;
use App\Models\Type;
use App\Models\Group;
use App\Models\DocumentList;
use App\User;

class Search extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'documents';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['fid','title','objective', 'document_year','document_type','pdf','created_by','updated_by','publish'];
    // protected $hidden = [];
    // protected $dates = [];



    public function getFullNameAttribute() {
    return $this->title . ' ' . $this->fid;
    }

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
    public function type()
    {
        return $this->hasOne('App\Models\Type','id','document_type');
    }

    public function ministries()
    {
        return $this->belongsToMany('App\Models\Ministry','document_ministries','document_id','ministry_id');
    }
    public function signature()
    {
        return $this->hasOne('App\Models\Signature', 'id');
    }

    public function signatures()
    {
        return $this->belongsToMany('App\Models\Signature','document_signatures','document_id','signature_id');
    }

    public function relatedMinistries()
    {
        return $this->belongsToMany('App\Models\Ministry','document_related_ministries','document_id','ministry_id');
    }

    public function documentsOfMinistry(){
      return $this->belongsToMany('App\Models\Ministry','document_ministries','ministry_id','document_id')
      // ->wherePivotIn('ministry_id', [2,3])
      ;
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    // public function rightByUsers()
    // {
    //     return $this->belongsToMany('App\User','document_users','document_id','user_id');
    // }
    //
    // public function rightByGroups()
    // {
    //     return $this->belongsToMany('App\Models\Group','document_groups','document_id','group_id');
    // }
    //
    // public function signatures()
    // {
    //     return $this->belongsToMany('App\Models\Signature','document_signatures','document_id','signature_id');
    // }
    //
    // public function ministries()
    // {
    //     return $this->belongsToMany('App\Models\Ministry','document_ministries','document_id','ministry_id');
    // }
    //
    // public function relatedMinistries()
    // {
    //     return $this->belongsToMany('App\Models\Ministry','document_related_ministries','document_id','ministry_id');
    // }
    //
    // public function documents()
    // {
    //     return $this->belongsToMany('App\Models\Document','document_lists','document_id','ministry_id');
    // }
    //
    // public function documentList()
    // {
    //     return $this->hasMany('App\Models\DocumentList', 'document_id', 'id');
    // }

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

    public function setPdfAttribute($value)
    {

      $attribute_name = "pdf";
      $disk = "document";
      $destination_path = "documents";

      // if the pdf was erased
      if ($value==null) {
          // delete the image from disk
          \Storage::disk($disk)->delete($this->pdf);
          // set null in the database column
          $this->attributes[$attribute_name] = null;
      }else {
        // if the document does exist then delete the previous one first
        if( \Storage::disk($disk)->exists($this->pdf) ){
          \Storage::disk($disk)->delete($this->pdf);
        }

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
      }

    }

    public static function boot()
    {
        static::deleting(function($obj) {
            \Storage::disk('document')->delete($obj->photo);
        });
    }

}
