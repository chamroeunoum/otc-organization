<?php
namespace App\Models\Document;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'documents';
    //protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = ['fid','title','objective', 'document_year','document_type','pdf','created_by','updated_by','publish', 'active', 'accessibility'];
    // protected $hidden = [];
    // protected $dates = [];

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

    public function types(){
      return $this->belongsToMany('\App\Models\Document\Tag\Type','document_types','document_id','type_id');
    }
    public function organizations(){
      return $this->belongsToMany('\App\Models\Document\Tag\Organization','organization_documents','document_id','organization_id');
    }
    public function signatures(){
      return $this->belongsToMany('\App\Models\Document\Tag\Signature','document_signatures','document_id','signature_id');
    }
    public function folders(){
      return $this->belongsToMany('\App\Models\Document\Folder','document_folders','document_id','folder_id');
    }
    public function favorites(){
      return $this->belongsToMany('\App\Models\Document\Favorite','document_favorites','document_id','user_id');
    }

    public function creater()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    // public function setPdfAttribute($value)
    // {
    //   $attribute_name = "pdf";
    //   $disk = "document";
    //   $destination_path = "documents";
    //   if( $this->$attribute_name != null && $this->$attribute_name != "" ){
    //     if( \Storage::disk($disk)->exists( $this->$attribute_name ) ){
    //       \Storage::disk($disk)->delete( $this->$attribute_name);
    //     }
    //   }
    //   // if the pdf was erased
    //   if ($value==null) {
    //     $this->attributes[$attribute_name] = null;
    //   }else {
    //     $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    //   }
    // }
    
}
