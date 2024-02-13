<?php

namespace App\Models\Meeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon ;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $casts = [
        'seichdey_preeng' => 'array' ,
        'reports' => 'array' ,
        'other_documents' => 'array'
    ];

    const STATUSES = [
        0 => 'NEW' ,
        1 => 'MEETING' ,
        2 => 'CONTINUE' ,
        4 => 'CHANGED' ,
        8 => 'DELAIED' ,
        16 => 'FINISHED' ,
    ];
    const STATUS_NEW = 0 , STATUS_MEETING = 1 , STATUS_CONTINUE = 2 , STATUS_CHANGE = 4 , STATUS_DELAY = 8 , STATUS_FINISHED = 16 ;

    public function regulators(){
        return $this->belongsToMany( \App\Models\Regulator\Regulator::class , 'meeting_regulators' , 'meeting_id' , 'regulator_id' );
    }

    public function organizations(){
        return $this->belongsToMany( \App\Models\Regulator\Tag\Organization::class , 'meeting_organizations', 'meeting_id', 'organization_id');
    }
    public function listOrganizations(){
        return $this->hasMany( \App\Models\Meeting\MeetingOrganization::class , 'meeting_id', 'id');
    }

    public function members(){
        return $this->belongsToMany( \App\Models\People\People::class , 'meeting_members', 'meeting_id', 'people_id');
    }

    public function listMembers(){
        return $this->hasMany( \App\Models\Meeting\MeetingMember::class , 'meeting_id', 'id');
    }

    public function rooms(){
        return $this->belongsToMany( \App\Models\Meeting\Room::class, 'meeting_rooms', 'room_id','meeting_id');
    }

    public function comments(){
        return $this->hasMany( \App\Models\Meeting\MeetingComment::class , 'meeting_id' , 'id' );
    }

    public function type(){
        return $this->belongsTo( \App\Models\Meeting\Type::class,'type_id','id');
    }

    public function createdBy(){
        return $this->belongsTo( \App\Models\User::class , 'created_by' , 'id' );
    }
    public function updatedBy(){
        return $this->belongsTo( \App\Models\User::class , 'updated_by' , 'id' );
    }

    public function getStatusAsString(){
        return [0=>'ថ្មី',1=>'កំពុងប្រជុំ',2=>'នៅបន្ត',4=>'ប្ដូរ',8=>'ពន្យាពេល',16=>'ចប់'][ $this->status ] ;
    }

    public function updateStatus(){
        $todayTime = Carbon::create( Carbon::now()->format('Y-m-d H:i') );
        $todayTime->second = 0 ;

        $startTime = Carbon::create( Carbon::parse( $this->date )->format('Y-m-d') );
        $endTime = $startTime->copy();
        
        list($startHour,$startMinute) = explode(':', $this->start );
        $startTime->hour = $startHour ;
        $startTime->minute = $startMinute ;
        $startTime->second = 0 ;

        list($endHour,$endMinute) = explode(':', $this->end );
        $endTime->hour = $endHour ;
        $endTime->minute = $endMinute ;
        $endTime->second = 0 ;
        
        if( $todayTime->lte( $startTime )){
            $this->update(['status' => Meeting::STATUS_NEW ]);
        }
        else if( $todayTime->gt( $endTime ) ) {
            $this->update(['status' => Meeting::STATUS_FINISHED ]);
        }
        else {
            $this->update(['status' => Meeting::STATUS_MEETING ]);
        }
         
    }
    /**
     * Get children
     */
    public function children(){
        return $this->hasMany( Meeting::class , 'pid' , 'id' );
    }
    /**
     * Get parent
     */
    public function ancestor(){
        return $this->belongsTo( Meeting::class , 'pid' , 'id' );
    }
    /**
     * Functions
     */
    /**
     * Total meeting by its status
     */
    public static function getMeetingsByStatus(){
        return static::selectRaw('status , count(status) as total')->groupby('status')->get()->map(function($meeting){
            return [
                'status' => [
                    'id' => $meeting->status ,
                    'name' => Meeting::STATUSES[ $meeting->status ] ,
                ],
                'total' => $meeting->total 
            ];
        });
    }
}
