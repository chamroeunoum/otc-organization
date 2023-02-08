<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YPProvince extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'yp_provinces';
	
	protected $fillable = ['name_en','name_kh', 'code', 'desp'];
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
	public function productOfProvince(){
		return $this->hasMany('\App\Models\YPProduct','province','id');
	}
	public function productOfDistrict(){
		return $this->hasMany('\App\Models\YPProduct','district','id');
	}
	public function productOfCommune(){
		return $this->hasMany('\App\Models\YPProduct','commune','id');
	}
	public function productOfVillage(){
		return $this->hasMany('\App\Models\YPProduct','village','id');
	}
	public static function getProvince(){
		return static::whereRaw('LENGTH(code) <= 2');
	}
	public static function getDistrictsOfProvince(){
		return static::getProvince()->get()->map(function($province){
			return [
				'name' => $province->name_kh ,
				'districts' => static::whereRaw("(LENGTH(code) =4) && code like \"".$province->code."%\"")->get()->map(function($district){
					return [
						'code' => $district->code ,
						'name' => $district->name_kh ,
						'totalBusinesses' => $district->productOfDistrict->count()
					];
				})
			];
		});
	}
	public static function getDistrictsOfProvinceByCategory(){
		return static::getProvince()->get()->map(function($province){
			return [
				'name' => $province->name_kh ,
				'districts' => static::whereRaw("(LENGTH(code) =4) && code like \"".$province->code."%\"")->get()->map(function($district){
					return [
						'code' => $district->code ,
						'name' => $district->name_kh ,
						'totalBusinesses' => $district->productOfDistrict->count() ,
						'categories' => \App\Models\YPProduct::selectRaw('district, category, count(id) as total')->whereNotNull('district')->groupby(['category','district'])->get()
					];
				})
			];
		});
	}
}
