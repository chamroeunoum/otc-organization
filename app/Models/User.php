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
        'firstname', 'lastname', 'email', 'password','phone', 'active', 'activation_token', 'avatar' , 'avatar_url' , 'username' , 'login_count' , 'last_login' , 'last_logout' , 'ip' , 'mac_address' , 'authenip' , 'authy_id' , 'people_id' ,
        'google_user_id' , 'google_user_email' , 'google_user_phone', 'google_user_picture' , 'google_user_fullname' , 'google_user_lastname' , 'google_user_firstname' ,
        'telegram_user_id' , 'telegram_user_auth_date' , 'telegram_user_hash' , 'telegram_user_firstname' , 'telegram_user_lastname' , 'telegram_user_username' , 'telegram_user_picture'
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
      return $this->hasMany(\App\Models\Attendant\Attendant::class,'user_id','id');
    }
    public function timeslots(){
      return $this->belongsToMany(\App\Models\Attendant\Timeslot::class,'user_timeslots','user_id','timeslot_id');
    }
    /**
     * The actual working time as minutes exclude the rest period
     */
    public function totalActualWorkingHoursOfTimeslots(){
      return $this->timeslots->map(function($ts){ 
        return [
          'id' => $ts->id ,
          'title' => $ts->title ,
          'rest_duration' => intval( $ts->rest_duration ) ,
          'minutes' => $ts->getMinutes() 
        ];
      });
    }
    public function userTimeslots(){
      return $this->hasMany( \App\Models\Attendant\UserTimeslot::class , 'user_id' , 'id' );
    }
    public function getPossibleTimeslot($datetime){
      if( strlen( $datetime ) > 0 ){
        $datetime = \Carbon\Carbon::parse( $datetime );
        return $this->timeslots == null
          ? null
          : $this->userTimeslots->filter(function($timeslot, $key) use( $datetime ){
              $start = \Carbon\Carbon::parse( $datetime->format("Y-m-d") . ' ' . $timeslot->start );
              $end = \Carbon\Carbon::parse( $datetime->format("Y-m-d") . ' ' . $timeslot->end );
              return 
                  // The datetime is smaller than the start
                  $datetime->lte ( $start ) ||
                  // The datetime is between the start and end
                  ( $datetime->gt( $start ) && $datetime->lte( $end ) ) 
                  ;
          })->first();
      }
      return null ;
    }
    public function organizationLeader()
    {
        return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_leader','people_id','organization_id');
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
      return $this->belongsToMany('\App\Models\Regulator\Regulator','regulator_favorites','people_id','regulator_id');
    }
    public function signatures(){
      return $this->belongsToMany('\App\Models\Regulator\Tag\Signature','user_signatures','people_id','signature_id');
    }
    
    // public function setImageAttribute($value)
    // {
    //     $attribute_name = "image";
    //     $disk = "uploads";
    //     $destination_path = "profiles";

    //     // if the image was erased
    //     if ($value==null) {
    //         // delete the image from disk
    //         \Storage::disk($disk)->delete($this->image);

    //         // set null in the database column
    //         $this->attributes[$attribute_name] = null;
    //     }

    //     // if a base64 was sent, store it in the db
    //     if (starts_with($value, 'data:image'))
    //     {
    //         // 0. Make the image
    //         $image = \Image::make($value);
    //         // 1. Generate a filename.
    //         $filename = md5($value.time()).'.jpg';
    //         // 2. Store the image on disk.

    //         // but delete the existing image first
    //         if( !$image->filesize()){
    //           $image_path = public_path().'/'.$this->image;
    //           if(\File::isFile($image_path))unlink($image_path);
    //           // then store the new image to the profiles folder
    //           \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
    //           // 3. Save the path to the database
    //           $this->attributes[$attribute_name] = $disk.'/'. $destination_path.'/'.$filename;
    //           if($this->people_id>0){
    //             $people = \App\Models\People\People::find($this->people_id);
    //             $people->image = $disk.'/'. $destination_path.'/'.$filename;
    //             $people->save();
    //           }
    //         }

    //     }
    // }

    public function folders(){
      return $this->hasMany('\App\Models\Folder\Folder','people_id','id');
    }

    public function getIsAdminAttribute()
    {
        return true;
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
          if( $obj->image != null && strlen(trim( $obj->image ))) \Storage::disk('public')->delete($obj->image);
        });
    }
    /**
     * Route notifications for the authy channel.
     *
     * @return int
     */
    public function routeNotificationForAuthy()
    {
        /**
         * Notify the sms to user
         */
        // $this->notify(new \App\Notifications\PhoneVerificationNotification('sms', true));
        return $this->authy_id;
    }
    /**
     * Third party authentication
     */
    public function thirdPartyAuthentications(){
      return $this->hasMany(\App\ThirdPartyAuthentication::class,'user_id','id');
    }
    public function facebookAuthentication(){
        $this->thirdPartyAuthentications()->where('name',\App\ThirdPartyAuthentication::FACEBOOK)->first();
    }
    public function googleAuthentication(){
        $this->thirdPartyAuthentications()->where('name',\App\ThirdPartyAuthentication::GOOGLE)->first();
    }
    public function appleAuthentication(){
        $this->thirdPartyAuthentications()->where('name',\App\ThirdPartyAuthentication::APPLE)->first();
    }
    public function favoriteMatras(){
      return $this->belongsToMany( \App\Models\Law\Book\Matra::class , 'favorite_matras' , 'user_id' , 'matra_id' );
    }

}
