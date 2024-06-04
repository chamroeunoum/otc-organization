<?php

namespace App\Models\Regulator\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionStructure extends Model
{
    use HasFactory;
    public function organization(){
        return $this->belongsTo( \App\Models\Regulator\Tag\Organization::class , 'organization_id' , 'id' );
    }
    public function position(){
        return $this->belongsTo( \App\Models\Regulator\Tag\Position::class , 'position_id' , 'id' );
    }
    public function childs(){
        return $this->hasMany( \App\Models\Regulator\Tag\PositionStructure::class , 'child_id' , 'id' );
    }
    public function parent(){
        return $this->belongsTo( \App\Models\Regulator\Tag\PositionStructure::class , 'parent_id' , 'id' );
    }
    public function getStructureChilds(){
        return $this->childs == null ? []
        : $this->childs->map(function( $child ){
            return $this->getChild( $child );
        });
    }
    private function getChilds($parent){
        return $parent->childs == null 
            ? $parent
            : $parent->childs->map(function( $child ){
                return $this->getChilds( $child );
            });
    }
}
