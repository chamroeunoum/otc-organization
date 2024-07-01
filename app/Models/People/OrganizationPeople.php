<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Regulator\Tag\Organization;

use Carbon\Carbon;

class OrganizationPeople extends Model
{
  use HasFactory, SoftDeletes;
  protected $table = 'organization_people';
  protected $guarded = ['id'];
  protected $primaryKey = 'id';
  public $timestamps = true;

   /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

  /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */
  
  /**
   * Relationships
   */
  public function organization(){
      return $this->belongsTo( Organization::class , "organization_id" , "id" );
  }
  public function person(){
      return $this->belongsTo( \App\Models\People\People::class , "people_id" , "id" );
  }
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
}
