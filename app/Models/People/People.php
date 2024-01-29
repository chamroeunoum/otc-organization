<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

  protected $table = 'people';

   /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

  //protected $table = 'document_users';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable = ['firstname', 'lastname', 'gender', 'dob', 'mobile_phone', 'office_phone', 'email', 'nid', 'father', 'mother', 'image', 'marry_status'];
  protected $hidden = ['deleted_at', 'created_by', 'modified_by', 'deleted_by'];
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
  public function user(){
    return $this->hasOne(\App\Models\User::class,'people_id','id');
  }
  
  public function countesies(){
    return $this->belongsToMany(\App\Models\Regulator\Tag\Countesy::class,'people_countesies','people_id','countesy_id');
  }

  public function organizations()
  {
      return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_people','people_id','organization_id');
  }
  public function organizationLeader()
  {
      return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_leader','people_id','organization_id');
  }

  public function positions(){
    return $this->belongsToMany('\App\Models\Regulator\Tag\Position','people_positions','people_id','position_id');
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
    
  public function setImageAttribute($value)
  {
      $attribute_name = "image";
      $disk = "public";
      $destination_path = "profiles";

      // if the image was erased
      if ($value==null) {
          // delete the image from disk
          if( $this->image !== "" && $this->image !== null ) \Storage::disk($disk)->delete($this->image);

          // set null in the database column
          $this->attributes[$attribute_name] = null;
      }

      // if a base64 was sent, store it in the db
      if (starts_with($value, 'data:image'))
      {
          // 0. Make the image
          $image = \Image::make($value);
          // 1. Generate a filename.
          $filename = md5($value.time()).'.jpg';
          // 2. Store the image on disk.

          // but delete the existing image first
          if( !$image->filesize()){
            $image_path = public_path().'/'.$this->image;
            if(\File::isFile($image_path))unlink($image_path);
            // then store the new image to the profiles folder
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $disk.'/'. $destination_path.'/'.$filename;
            // need to update all the accounts related to this profile
            if($this->id>0){
              // get all the related accounts of this profile to update the profile pictures
              $users = \App\User::where('people_id','=',$this->id)->get();
              foreach($users AS $index => $user ){
                \App\User::where('id', $user->id)
                  ->update(['image' => $disk.'/'. $destination_path.'/'.$filename ]);
              }
            }
          }
      }
  }

  public function ministries(){
    return $this->belongsToMany('\App\Models\Ministry','ministry_people','people_id','ministry_id');
  }

  public static function boot()
  {
      parent::boot();
      static::deleting(function($obj) {
        if( $obj->image !== "" && $obj->image !== null ) \Storage::disk('public')->delete($obj->image);
      });
  }
}
