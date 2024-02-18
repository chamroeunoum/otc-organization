<?php
namespace App\Models\Document;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
class Document extends Model
{
    use SoftDeletes;
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

    public function creater()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }
    
}
