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
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon as Carbon;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password','phone', 'active', 'activation_token', 'avatar' , 'avatar_url' , 'username' , 'login_count' , 'last_login' , 'last_logout' , 'ip' , 'mac_address' , 'authenip' , 'authy_id' , 'people_id'
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
    public function person(){
      return $this->belongsTo('App\Models\People\People','people_id','id');
    }
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
            \Storage::disk('uploads')->delete($obj->image);
        });
    }
}
