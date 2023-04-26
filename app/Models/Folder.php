<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'folders';
	// protected $primaryKey = 'id';
	protected $guarded = ['id'];
	// protected $hidden = ['id'];
	// protected $fillable = ['name', 'user_id','pid'];
	public $timestamps = true;
	protected $dates = ['created_at' , 'updated' ,'deleted_at'];
	protected $casts = [
		'created_at' => 'datetime',
		'updated' => 'datetime'
	];

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
	/**
	 * Get all of the comments for the Folder
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function regulators()
	{
			return $this->belongsToMany('\App\Models\Document','document_folders','folder_id','document_id');
	}
	public function user(){
    return $this->belongsTo('\App\Models\User','user_id','id');
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
