<?php

namespace App\Models\Law\Book;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'parts';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getSections(){
        return $this->sections()->get()->map(function($record){
            return [
                'id' => $record->id ,
                'title' => $record->number . " ៖ " . $record->title,
                'children' => [] ,
                'type'=>'section'
            ];
        });
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
    public function editor()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
    public function book()
    {
        return $this->belongsTo(\App\Models\Law\Book\Book::class, 'book_id', 'id');
    }
    public function kunty()
    {
        return $this->belongsTo(\App\Models\Law\Book\Kunty::class, 'kunty_id', 'id');
    }
    public function matika()
    {
        return $this->belongsTo(\App\Models\Law\Book\Matika::class, 'matika_id', 'id');
    }
    public function chapter()
    {
        return $this->belongsTo(\App\Models\Law\Book\Chapter::class, 'chapter_id', 'id');
    }
    public function sections()
    {
        return $this->hasMany(\App\Models\Law\Book\Section::class, 'part_id', 'id');
    }
    public function matras()
    {
        return $this->hasMany(\App\Models\Law\Book\Matra::class, 'part_id', 'id');
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
