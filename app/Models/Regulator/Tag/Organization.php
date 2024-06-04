<?php

namespace App\Models\Regulator\Tag;
use App\Models\Tag\Tag;
use App\Models\Meeting\Meeting;
use App\Models\Meeting\MeetingOrganization;

/**
 * This class is use to identify the organization of the regulator
 */
class Organization extends Tag
{
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
        return $this->where('tpid',"LIKE", $this->tpid . ":" . $this->id . "%" )->count();
    }
    /**
     * Relationship
     */
    /**
     * Organization
     */
    public function regulators(){
        return $this->belongsToMany('\App\Models\Regulator\Regulator','organization_regulators','organization_id','regulator_id');
    }
    public function staffs(){
        return $this->belongsToMany('\App\Models\People\People','organization_people','organization_id','people_id');
    }
    public function leader(){
        return $this->belongsToMany('\App\Models\People\People','organization_leader','organization_id','people_id');
    }
    public function meetings(){
        return $this->belongsToMany( Meeting::class , MeetingOrganization::class , 'organization_id' , 'meeting_id' );
    }
    public function attendantChecktimes(){
        return $this->hasMany( App\Models\Attendant\AttendantCheckTime::class,'organization_id','id');
    }
}
