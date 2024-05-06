<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends SpatieRole
{

    /**
     * Backend Roles
     */
    const ROLE_SUPER = 'super' , ROLE_ADMIN = 'admin' , ROLE_BACK = 'backend' ;
    /**
     * Client Roles
     */
    const ROLE_CLIENT = 'client' ;
    /**
     * All Roles
     */
    const ROLES = [
        /**
         * Backend Roles
         */
        'super' => 'super' ,
        'admin' => 'admin' ,
        'backend' => 'backend' ,
        /**
         * Client Roles
         */
        'client' => 'client'
    ];
    protected $fillable = ['name', 'updated_at', 'created_at','guard_name','tag'];
    public function users() : BelongsToMany{
        return $this->belongsToMany( \App\Models\User::class , 'user_role' , 'role_id' , 'user_id' );
    }
    public static function scopeSuper(){
        return self::where([
            'tag' => 'core_service' ,
            'name' => 'super'
        ]);
    }
    public static function scopeAdmin(){
        return self::where([
            'tag' => 'core_service' ,
            'name' => 'admin'
        ]);
    }
    public static function scopeBackend(){
        return self::where([
            'tag' => 'core_service' ,
            'name' => 'backend'
        ]);
    }
    public static function scopeClient(){
        return self::where([
            'tag' => 'client_service' ,
            'name' => 'client'
        ]);
    }
}