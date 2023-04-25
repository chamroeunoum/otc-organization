<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name', 'updated_at', 'created_at','guard_name'];

    public function users(){
        return $this->belongsToMany(\App\Models\User::class,'user_role','role_id','user_id');
    }

}