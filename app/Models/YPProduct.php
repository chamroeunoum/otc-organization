<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YPProduct extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'yp_products';
	
	protected $fillable = ['name', 'category','phone', 'address'];
	public $timestamps = true;

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
	public function category(){
		return $this->belongsTo('\App\Models\YPCategory','category','id');
	}
	
}
