<?php

namespace App\Models\Regulator\Tag;
use App\Models\Tag\Tag;

/**
 * This class is use to identify the organization of the regulator
 */
class Position extends Tag
{
    // protected $guarded = ['id'];
    /**
     * Abstract methods
     */
    protected static function getModel(){
        return self::class;
    }
    protected static function getRoot(){
        return self::where('model',self::class)->first();
    }
    protected static function getTree($nodeId=false){
        $node = intval( $nodeId ) ? self::find( intval($nodeId) ) : [] ;
        if( $node != null && $node->childNodes != null && !$node->childNodes->isEmpty() ){
            $node->childNodes = $node->childNodes()->select('id','name','desp')->where('active',1)->orderby('record_index','asc')->get()->map(function($c){
                return self::getChilds( $c );
            }) ;
        }
        return $node ;
    }
    private static function getChilds($node){
        if( !$node->childNodes->isEmpty() ){
            return $node->childNodes()->select('id','name','desp')->where('active',1)->orderby('record_index','asc')->get()->map(function($c){ 
                return self::getChilds( $c );
            });
        }
        return $node ;
    }
    public function childNodes(){
        return $this->hasMany(self::class,'pid','id');
    }
    public function parentNode(){
        return $this->hasOne(self::class,'id','pid');
    }
    public function totalChildNodesOfAllLevels(){
        return self::where('tpid',"LIKE", $this->tpid . "%" )->count();
    }
    /**
     * Relationship
     */
    /**
     * Organization
     */
    public function regulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','position_regulators','position_id','regulator_id');
    }
    public function staffs(){
        return $this->belongsToMany('\App\Models\User','position_users','position_id','user_id');
    }
    public static function getInstance(){
        return static::where('model', self::class )->first();
    }
}
