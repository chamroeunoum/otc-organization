<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = "tags" ;
    
    public function __construct($model){
        $this->model = $model ;
    }
    public function getModel(){
        return $this->model;
    }
    public function getTableName(){
        return $this->table ;
    }
    /**
     * Relationship
     */
    /**
     * Functions
     */
    public function root(){
        return \DB::table( $this->getTableName() )
            ->where('model',$this->getModel() )
            ->whereNull('deleted_at')
            ->where(function($q){ 
                $q->whereNull('pid')->orWhere('pid',0); 
            })->first();
    }
    public function children(){
        $root = $this->root() ;
        return $root != null 
            ? \DB::table( $this->getTableName() )->where('pid', $root->id )->whereNull('deleted_at')
            : null ;
    }
    public function add($name,$desp=""){
        if( ( $root = $this->root() ) != null ){
            return \DB::table( $this->getTableName() )->updateOrInsert(
                [
                    'name' => $name , 
                    'desp' => $desp 
                ],
                [    
                    'pid' => $root->id ,
                    'model' => $root->model ,
                    'deleted_at' => null
                ]
            );
        }
        return null ;
    }
}
