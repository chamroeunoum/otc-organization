<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    protected $fillable = ['fid','title','objective', 'document_year','document_type','pdf','created_by','updated_by','publish'];
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
    public function type()
    {
        return $this->hasOne('App\Models\Type','id','document_type');
    }

    public function ministries()
    {
        return $this->belongsToMany('App\Models\Ministry','document_ministries','document_id','ministry_id');
    }
    public function ownMinistries()
    {
        return $this->belongsToMany('App\Models\Ministry','document_own_ministries','document_id','ministry_id');
    }
    public function relatedMinistries()
    {
        return $this->belongsToMany('App\Models\Ministry','document_related_ministries','document_id','ministry_id');
    }
    public function signature()
    {
        return $this->hasOne('App\Models\Signature', 'id');
    }

    public function signatures()
    {
        return $this->belongsToMany('App\Models\Signature','document_signatures','document_id','signature_id');
    }

    public function documentsOfMinistry(){
      return $this->belongsToMany('App\Models\Ministry','document_ministries','ministry_id','document_id')
      // ->wherePivotIn('ministry_id', [2,3])
      ;
    }
    public function regulator(){
        return $this->hasOne(UnitTeamworkRegulator::class,'document_id');
    }

    public function regulators(){
        return $this->belongsToMany(UnitTeamworkType::class,'unit_teamwork_regulators','document_id','unit_teamwork_type_id');
    }
    public function underMinistries(){
        return $this->belongsToMany(Ministry::class,'unit_teamwork_regulators','document_id','ministry_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
    // relation to Unit Teamwork Type table
    public function unitTeamworkType(){
        return \App\Models\UnitTeamworkType::get();
    }
    
}
