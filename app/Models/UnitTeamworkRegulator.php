<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Document;
use App\Models\UnitTeamworkType;

class UnitTeamworkRegulator extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'unit_teamwork_regulators';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function regulatorByUnitTeamworkTypes(){
        return static::selectRaw('unit_teamwork_type_id, count(*) as total')->groupBy('unit_teamwork_type_id')->orderBy('unit_teamwork_type_id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function document(){
        return $this->belongsTo(Document::class,'document_id');
    }
    public function ministry()
    {
        return $this->belongsTo('App\Models\Ministry','ministry_id');
    }
    public function unitTeamworkType(){
        return $this->belongsTo(UnitTeamworkType::class,'unit_teamwork_type_id');
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
