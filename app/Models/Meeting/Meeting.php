<?php

namespace App\Models\Meeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon ;
use App\Models\Regulator\LegalDraft;

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
        1 => 'NEW' ,
        2 => 'MEETING' ,
        4 => 'CONTINUE' ,
        8 => 'CHANGED' ,
        16 => 'DELAIED' ,
        32 => 'FINISHED' ,
    ];
    const STATUS_NEW = 1 , STATUS_MEETING = 2 , STATUS_CONTINUE = 4 , STATUS_CHANGE = 8 , STATUS_DELAY = 16 , STATUS_FINISHED = 32 ;

    /**
     * Get the legal draft that owns the Meeting
     */
    public function legalDraft()
    {
        return $this->belongsTo(LegalDraft::class, 'legal_draft_id', 'id');
    }

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
        return $this->belongsToMany( \App\Models\Meeting\Room::class, 'meeting_rooms', 'meeting_id','room_id');
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
            $this->legalDraft != null ? $this->legalDraft->update([ 'status' => 0 ]) : false ;
        }
        else if( $todayTime->gt( $endTime ) ) {
            $this->update(['status' => Meeting::STATUS_FINISHED ]);
            $this->legalDraft != null ? $this->legalDraft->update([ 'status' => 2 ]) : false ;
        }
        else {
            $this->update(['status' => Meeting::STATUS_MEETING ]);
            $this->legalDraft != null ? $this->legalDraft->update([ 'status' => 1 ]) : false ;
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
    public function totalSpentMinutes(){
        $start = $this->actual_start != null && strlen($this->actual_start) 
            ? $this->actual_start 
            : (
                $this->start != null && strlen( $this->start ) ? $this->start : false
            );
        $end = $this->actual_end != null && strlen($this->actual_end) 
            ? $this->actual_end 
            : (
                $this->end != null && strlen( $this->end ) ? $this->end : false
            );
        return $start && $end 
            ? Carbon::parse( $start )->diffInMinutes( Carbon::parse( $end ) )
            : 0 ;
    }
    /**
     * Total meeting by its status
     */
    public static function getMeetingsByStatus($creatorIds=[]){
        $builder = static::selectRaw('status , count(status) as total');
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('status')->get()->map(function($meeting){
                return [
                    'status' => [
                        'id' => $meeting->status ,
                        'name' => Meeting::STATUSES[ $meeting->status ] ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting by its type
     */
    public static function getMeetingsByType($creatorIds=[]){
        $builder = static::selectRaw('type_id , count(type_id) as total');
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting within this week
     */
    public static function totalInThisWeek($creatorIds=[]){
        $today = Carbon::now();
        $builder = static::selectRaw('type_id , count(type_id) as total')->whereBetween('date', [ $today->startOfWeek()->format('Y-m-d') , $today->endOfWeek()->format('Y-m-d') ] );
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting within this month
     */
    public static function totalInThisMonth($creatorIds=[]){
        $today = Carbon::now();
        $builder = static::selectRaw('type_id , count(type_id) as total')->whereBetween('date', [ $today->startOfMonth()->format('Y-m-d') , $today->endOfMonth()->format('Y-m-d') ] );
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting within this term
     */
    public static function totalInFirstTerm($creatorIds=[]){
        $start = Carbon::now()->startOfYear();
        $end = $start->copy()->addMonths(2);
        $builder = static::selectRaw('type_id , count(type_id) as total')->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting within this semester
     */
    public static function totalInFirstSemester($creatorIds=[]){
        $start = Carbon::now()->startOfYear();
        $end = $start->copy()->addMonths(5);
        $builder = static::selectRaw('type_id , count(type_id) as total')->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
    /**
     * Total meeting within this year
     */
    public static function totalInThisYear($creatorIds=[]){
        $start = Carbon::now()->startOfYear();
        $end = $start->copy()->addMonths(11);
        $builder = static::selectRaw('type_id , count(type_id) as total')->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
        if( is_array($creatorIds) && !empty( $creatorIds ) ) $builder->whereIn('created_by', $creatorIds );
        return [
            'total' => $builder->count() ,
            'records' => $builder->groupby('type_id')->get()->map(function($meeting){
                return [
                    'type' => [
                        'id' => $meeting->type->id ,
                        'name' => $meeting->type->name ,
                    ],
                    'total' => $meeting->total 
                ];
            })
        ];
    }
}
