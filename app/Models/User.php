<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
// use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\File;
use Storage;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon as Carbon;
use \App\Models\Attendant\Attendant ;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password','phone', 'active', 'activation_token', 'avatar' , 'avatar_url' , 'username' 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    protected $is_admin = true;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getName(){
      $user = $this->find($this->id);
      return $user->lastname.' '.$user->firstname;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function roles(){
      return $this->belongsToMany('App\Models\Role','user_role','user_id','role_id');
    }
    public function attendants(){
      return $this->hasMany( \App\Models\Attendant\Attendant::class, 'user_id' , 'id' );
    }
    public function timeslots(){
      return $this->belongsToMany('App\Models\Attendant\Timeslot','user_timeslots','user_id','timeslot_id');
    }
    public function organizations()
    {
        return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_staffs','user_id','organization_id');
    }
    public function organizationLeader()
    {
        return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_leader','user_id','organization_id');
    }
    /**
     * ឯកសារដែលគណនីមួយនេះបានបង្កើត
     */
    public function regulators(){
        return $this->hasMany(\App\Models\Regulator\Regulator::class,'created_by');
    }
    public function person(){
      return $this->belongsTo('App\Models\People\People','people_id','id');
    }
    public function favorites(){
      return $this->belongsToMany('\App\Models\Regulator\Regulator','regulator_favorites','user_id','regulator_id');
    }
    public function positions(){
      return $this->belongsToMany('\App\Models\Regulator\Tag\Position','position_users','user_id','position_id');
    }
    public function signatures(){
      return $this->belongsToMany('\App\Models\Regulator\Tag\Signature','user_signatures','user_id','signature_id');
    }
    
    public function getAttendantsOfMonth( $date = false , $attendantTypes = false ){
      $date = $date != false ? Carbon::parse( $date ) : Carbon::now() ;
      $builder = $this->attendants()
        ->whereYear('date', $date->format('Y') )
        ->whereMonth('date', $date->format('m') );
      if( !is_array( $attendantTypes ) && in_array( $attendantTypes , Attendant::ATTENDANT_TYPES ) ){
        $builder->where('attendant_type',$attendantTypes );
      }
      else if( is_array( $attendantTypes ) && array_intersect( $attendantTypes , Attendant::ATTENDANT_TYPES ) ){
        $builder->whereIn('attendant_type',$attendantTypes );
      }
      return $builder->get()
        ->map(function($att){
          return [ $att->date => $att->calculateWorkingTime() ];
        });
      ;
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "profiles";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

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
              if($this->people_id>0){
                $people = \App\Models\People\People::find($this->people_id);
                $people->image = $disk.'/'. $destination_path.'/'.$filename;
                $people->save();
              }
            }

        }
    }

    public function folders(){
      return $this->hasMany('\App\Models\Regulator\Folder','user_id','id');
    }

    public function getIsAdminAttribute()
    {
        return true;
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('uploads')->delete($obj->image);
        });
    }

}
