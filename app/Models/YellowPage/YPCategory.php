<?php

namespace App\Models\YellowPage;

use Illuminate\Database\Eloquent\Model;

class YPCategory extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'yp_categories';
	
	protected $fillable = ['name', 'desp','pid'];

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
	public function products(){
		return $this->hasMany('\App\Models\YPProduct','category','id');
	}
	
}
