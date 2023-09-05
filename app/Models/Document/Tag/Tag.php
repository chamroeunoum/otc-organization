<?php

namespace App\Models\Document\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model 
{
    protected $table = "tags" ;
    private $model = null ;
    protected $guarded = ['id'];
    
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
        return $this->where('model',$this->getModel())
            ->whereNull('deleted_at')
            ->where(function($q){ 
                $q->whereNull('tpid')->orWhere('tpid',0); 
            })->first();
    }
    public function children(){
        $root = $this->root() ;
        return $root != null 
            ? $this->whereNull('deleted_at')
                ->where('tpid',$root->id)
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
                    'tpid' => $root->id ,
                    'pid' => null ,
                    'model' => $root->model ,
                    'deleted_at' => null
                ]
            );
        }
        return null ;
    }
    
}
