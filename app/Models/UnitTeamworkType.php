<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\UnitTeamworkRegulator;

class UnitTeamworkType extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'unit_teamwork_types';
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
    /**
     * បូកសរុប ប្រភេទនៃការបង្កើតក្រសួង តាមប្រភេទនៃការបង្កើតនីមួយៗ
     */
    public static function totalCreationOfUnitTeamworkTypes(){
        $result = [] ;
        foreach( static::select('id','title')->get() AS $index => $unitTeamworkType ){
            if( $unitTeamworkType -> regulators() -> count() > 0 ){
                $obj = new \stdClass();
                $obj->id = $unitTeamworkType -> id ;
                $obj->title = $unitTeamworkType -> title ;
                $obj->total = $unitTeamworkType -> regulators() -> count() ;
                $result[$obj->id] = $obj ;
            }
        }
        return $result;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function regulators(){
        return $this->hasMany(UnitTeamworkRegulator::class,'unit_teamwork_type_id');
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
