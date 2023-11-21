<?php

namespace App\Models\Attendant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class Holiday extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    /**
     * Check whether this holiday is the sunday
     */
    public function isSunday(){
        return $this->date != null ? Carbon::parse( $this->date )->isSunday() : false ;
    }
    public static function isHoliday($date){
        return $date != null ? Carbon::parse( $this->date ) : false ;
    }
}
