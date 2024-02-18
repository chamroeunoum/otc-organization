<?php

namespace App\Models\Document;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document\DocumentList;
use App\User;

class Search extends Model
{

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
