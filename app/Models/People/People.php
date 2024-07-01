<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meeting\Meeting;
use App\Models\Meeting\MeetingMember;
use Carbon\Carbon;

class People extends Model
{

  protected $table = 'people';

   /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

  //protected $table = 'document_users';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable = ['firstname', 'lastname', 'gender', 'dob', 'mobile_phone', 'office_phone', 'email', 'nid', 'father', 'mother', 'image', 'marry_status'];
  protected $hidden = ['deleted_at', 'created_by', 'modified_by', 'deleted_by'];
  // protected $dates = [];

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
  public function user(){
    return $this->hasOne(\App\Models\User::class,'people_id','id');
  }
  
  public function countesies(){
    return $this->belongsToMany(\App\Models\Regulator\Tag\Countesy::class,'people_countesies','people_id','countesy_id');
  }

  public function organizations()
  {
      return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_people','people_id','organization_id');
  }
  public function organizationPeople()
  {
      return $this->hasMany('App\Models\People\OrganizationPeople','people_id','id');
  }
  public function organizationLeader()
  {
      return $this->belongsToMany('App\Models\Regulator\Tag\Organization','organization_leader','people_id','organization_id');
  }

  public function positions(){
    return $this->belongsToMany('\App\Models\Regulator\Tag\Position','people_positions','people_id','position_id');
  }
  public function meetings(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' );
  }
  public function meetingsJoinedAsLeaderOfLeadMeeting(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','leader')->where('group','lead_meeting');
  }
  public function meetingsJoinedAsDeputyLeaderOfLeadMeeting(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','deputy_leader')->where('group','lead_meeting');
  }
  public function meetingsJoinedAsMemberOfLeadMeeting(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','member')->where('group','lead_meeting');
  }
  public function meetingsJoinedAsLeaderOfDefender(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','leader')->where('group','defender');
  }
  public function meetingsJoinedAsDeputyLeaderOfDefender(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','deputy_leader')->where('group','defender');
  }
  public function meetingsJoinedAsMemberOfDefender(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','member')->where('group','defender');
  }
  public function meetingsJoinedAsMember(){
    return $this->belongsToMany( Meeting::class , MeetingMember::class , 'people_id' , 'meeting_id' )
      ->wherePivot('role','member')->where('group','audient');
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
    
  public function setImageAttribute($value)
  {
      $attribute_name = "image";
      $disk = "public";
      $destination_path = "profiles";

      // if the image was erased
      if ($value==null) {
          // delete the image from disk
          if( $this->image !== "" && $this->image !== null ) \Storage::disk($disk)->delete($this->image);

          // set null in the database column
          $this->attributes[$attribute_name] = null;
      }

      // if a base64 was sent, store it in the db
      if (starts_with($value, 'data:image'))
      {
          // 0. Make the image
          $image = \Image::make($value);
          // 1. Generate a filename.
          $filename = md5($value.time()).'.jpg';
          // 2. Store the image on disk.

          // but delete the existing image first
          if( !$image->filesize()){
            $image_path = public_path().'/'.$this->image;
            if(\File::isFile($image_path))unlink($image_path);
            // then store the new image to the profiles folder
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $disk.'/'. $destination_path.'/'.$filename;
            // need to update all the accounts related to this profile
            if($this->id>0){
              // get all the related accounts of this profile to update the profile pictures
              $users = \App\User::where('people_id','=',$this->id)->get();
              foreach($users AS $index => $user ){
                \App\User::where('id', $user->id)
                  ->update(['image' => $disk.'/'. $destination_path.'/'.$filename ]);
              }
            }
          }
      }
  }

  public function ministries(){
    return $this->belongsToMany('\App\Models\Ministry','ministry_people','people_id','ministry_id');
  }

  public static function boot()
  {
      parent::boot();
      static::deleting(function($obj) {
        if( $obj->image !== "" && $obj->image !== null ) \Storage::disk('public')->delete($obj->image);
      });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types
   */
  public static function totalMeetingsByType($leaderId =false , $creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    if( $leaderId != false && intval( $leaderId ) > 0 ){
        $builder->where('id',$leaderId);
    }
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting();
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      // Copy the builder 
      // $copyBuilder = new \Illuminate\Database\Eloquent\Builder(clone $builder->getQuery());
      // $copyBuilder->setModel($builder->getModel());
      return [
        'total' => $builder->count() ,
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'meetings' => $builder->get()->map(function($record){
            $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            // $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
            //     return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            // });
            // $record->reports = collect( $record->reports )->map(function($report){
            //     return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            // });
            // $record->other_documents = collect( $record->other_documents )->map(function($other){
            //     return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            // });
            // $record->regulators = $record->regulators()->get()->map(function($regulator){
            //     $regulator->pdf = strlen( $regulator->pdf ) > 0 
            //         ? (
            //             \Storage::disk('regulator')->exists( $regulator->pdf )
            //             ? \Storage::disk('regulator')->url( $regulator->pdf )
            //             : (
            //                 \Storage::disk('document')->exists( $regulator->pdf )
            //                 ? \Storage::disk('document')->url( $regulator->pdf )
            //                 : false
            //             )
            //         )
            //         : false ;
            //     return [
            //         "id" => $regulator->id ,
            //         "fid" => $regulator->fid ,
            //         "title" => $regulator->title ,
            //         "objective" => $regulator->objective ,
            //         "pdf" => $regulator->pdf ,
            //         "year" => $regulator->year
            //     ];
            // });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types within this week
   */
  public static function totalMeetingsByTypeThisWeek($creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $today = Carbon::now();
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting()
        ->whereBetween('date', [ $today->startOfWeek()->format('Y-m-d') , $today->endOfWeek()->format('Y-m-d') ] );
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      return [
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'total' => $builder->count() ,
        'meetings' => $builder->get()->map(function($record){
          $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
                return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            });
            $record->reports = collect( $record->reports )->map(function($report){
                return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            });
            $record->other_documents = collect( $record->other_documents )->map(function($other){
                return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            });
            $record->regulators = $record->regulators()->get()->map(function($regulator){
                $regulator->pdf = strlen( $regulator->pdf ) > 0 
                    ? (
                        \Storage::disk('regulator')->exists( $regulator->pdf )
                        ? \Storage::disk('regulator')->url( $regulator->pdf )
                        : (
                            \Storage::disk('document')->exists( $regulator->pdf )
                            ? \Storage::disk('document')->url( $regulator->pdf )
                            : false
                        )
                    )
                    : false ;
                return [
                    "id" => $regulator->id ,
                    "fid" => $regulator->fid ,
                    "title" => $regulator->title ,
                    "objective" => $regulator->objective ,
                    "pdf" => $regulator->pdf ,
                    "year" => $regulator->year
                ];
            });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types within this month
   */
  public static function totalMeetingsByTypeThisMonth($creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $today = Carbon::now();
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting()
        ->whereBetween('date', [ $today->startOfMonth()->format('Y-m-d') , $today->endOfMonth()->format('Y-m-d') ] );
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      return [
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'total' => $builder->count() ,
        'meetings' => $builder->get()->map(function($record){
          $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
                return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            });
            $record->reports = collect( $record->reports )->map(function($report){
                return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            });
            $record->other_documents = collect( $record->other_documents )->map(function($other){
                return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            });
            $record->regulators = $record->regulators()->get()->map(function($regulator){
                $regulator->pdf = strlen( $regulator->pdf ) > 0 
                    ? (
                        \Storage::disk('regulator')->exists( $regulator->pdf )
                        ? \Storage::disk('regulator')->url( $regulator->pdf )
                        : (
                            \Storage::disk('document')->exists( $regulator->pdf )
                            ? \Storage::disk('document')->url( $regulator->pdf )
                            : false
                        )
                    )
                    : false ;
                return [
                    "id" => $regulator->id ,
                    "fid" => $regulator->fid ,
                    "title" => $regulator->title ,
                    "objective" => $regulator->objective ,
                    "pdf" => $regulator->pdf ,
                    "year" => $regulator->year
                ];
            });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types within this first term
   */
  public static function totalMeetingsByTypeFirstTerm($creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $start = Carbon::now()->startOfYear();
      $end = $start->copy()->addMonths(2);
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting()
        ->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      return [
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'total' => $builder->count() ,
        'meetings' => $builder->get()->map(function($record){
          $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
                return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            });
            $record->reports = collect( $record->reports )->map(function($report){
                return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            });
            $record->other_documents = collect( $record->other_documents )->map(function($other){
                return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            });
            $record->regulators = $record->regulators()->get()->map(function($regulator){
                $regulator->pdf = strlen( $regulator->pdf ) > 0 
                    ? (
                        \Storage::disk('regulator')->exists( $regulator->pdf )
                        ? \Storage::disk('regulator')->url( $regulator->pdf )
                        : (
                            \Storage::disk('document')->exists( $regulator->pdf )
                            ? \Storage::disk('document')->url( $regulator->pdf )
                            : false
                        )
                    )
                    : false ;
                return [
                    "id" => $regulator->id ,
                    "fid" => $regulator->fid ,
                    "title" => $regulator->title ,
                    "objective" => $regulator->objective ,
                    "pdf" => $regulator->pdf ,
                    "year" => $regulator->year
                ];
            });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types within this first semester
   */
  public static function totalMeetingsByTypeFirstSemester($creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $start = Carbon::now()->startOfYear();
      $end = $start->copy()->addMonths(5);
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting()
        ->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      return [
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'total' => $builder->count() ,
        'meetings' => $builder->get()->map(function($record){
          $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
                return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            });
            $record->reports = collect( $record->reports )->map(function($report){
                return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            });
            $record->other_documents = collect( $record->other_documents )->map(function($other){
                return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            });
            $record->regulators = $record->regulators()->get()->map(function($regulator){
                $regulator->pdf = strlen( $regulator->pdf ) > 0 
                    ? (
                        \Storage::disk('regulator')->exists( $regulator->pdf )
                        ? \Storage::disk('regulator')->url( $regulator->pdf )
                        : (
                            \Storage::disk('document')->exists( $regulator->pdf )
                            ? \Storage::disk('document')->url( $regulator->pdf )
                            : false
                        )
                    )
                    : false ;
                return [
                    "id" => $regulator->id ,
                    "fid" => $regulator->fid ,
                    "title" => $regulator->title ,
                    "objective" => $regulator->objective ,
                    "pdf" => $regulator->pdf ,
                    "year" => $regulator->year
                ];
            });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
  /**
   * Get total meetings which lead by each leader and each meeting types within this Year
   */
  public static function totalMeetingsByTypeThisYear($creatorIds=[]){
    $builder = static::whereIn('id', 
      // Fetching the people_id from meeting_members table to cut down the number of the records
      \App\Models\Meeting\MeetingMember::selectRaw('people_id')->where('role','leader')->where('group','lead_meeting')->groupby('people_id')->pluck('people_id')
    );
    return $builder->get()->map(function($people) use( $creatorIds ) {
      $start = Carbon::now()->startOfYear();
      $end = $start->copy()->addMonths(11);
      $builder = $people->meetingsJoinedAsLeaderOfLeadMeeting()
        ->whereBetween('date', [ $start->startOfMonth()->format('Y-m-d') , $end->endOfMonth()->format('Y-m-d') ] );
      if( !empty( $creatorIds ) ) $builder->whereIn('created_by',$creatorIds) ;
      return [
        'totalSpentMinutes' => $builder->get()->map(function($meeting){ return $meeting->totalSpentMinutes();})->sum() ,
        'people' => [
          'id' => $people->id ,
          'lastname' => $people->lastname ,
          'firstname' => $people->firstname ,
          'countesies' => $people->countesies ,
          'organizations' => $people->organizations ,
          'positions' => $people->positions
        ] ,
        'total' => $builder->count() ,
        'meetings' => $builder->get()->map(function($record){
          $record->updateStatus();
            $record->createdBy ;
            $record->updatedBy ;
            $record->type ;

            $record->seichdey_preeng = collect( $record->seichdey_preeng )->map(function($preeng){
                return strlen($preeng) && Storage::disk('meeting')->exists( $preeng ) ? Storage::disk("meeting")->url( $preeng ) : false ;
            });
            $record->reports = collect( $record->reports )->map(function($report){
                return strlen($report) && Storage::disk('meeting')->exists( $report ) ? Storage::disk("meeting")->url( $report ) : false ;
            });
            $record->other_documents = collect( $record->other_documents )->map(function($other){
                return strlen($other) && Storage::disk('meeting')->exists( $other ) ? Storage::disk("meeting")->url( $other ) : false ;
            });
            $record->regulators = $record->regulators()->get()->map(function($regulator){
                $regulator->pdf = strlen( $regulator->pdf ) > 0 
                    ? (
                        \Storage::disk('regulator')->exists( $regulator->pdf )
                        ? \Storage::disk('regulator')->url( $regulator->pdf )
                        : (
                            \Storage::disk('document')->exists( $regulator->pdf )
                            ? \Storage::disk('document')->url( $regulator->pdf )
                            : false
                        )
                    )
                    : false ;
                return [
                    "id" => $regulator->id ,
                    "fid" => $regulator->fid ,
                    "title" => $regulator->title ,
                    "objective" => $regulator->objective ,
                    "pdf" => $regulator->pdf ,
                    "year" => $regulator->year
                ];
            });
            $record->organizations = $record->organizations()->get()->map(function($organization) use( $record ){
                return [
                    "id" => $organization->id ,
                    "name" => $organization->name
                ];
            });
            $record->members = $record->members()->get()->map(function($member) use( $record ){
                $meetingMember = $record->listMembers()->where('people_id', $member->id)->first();
                return [
                    "id" => $member->id ,
                    "firstname" => $member->firstname ,
                    "lastname" => $member->lastname ,
                    "role" => $meetingMember->role ,
                    "group" => $meetingMember->group ,
                    "remark" => $meetingMember->remark
                ];
            });
            $record->rooms = $record->rooms()->get()->map(function($place) use( $record ){
                return [
                    "id" => $place->id ,
                    "organization" => $place->organization == null ? null : [
                        'id' => $place->organization->id ,
                        'name' => $place->organization->name
                    ] ,
                    "name" => $place->name ,
                    "desp" => $place->desp
                ];
            });
            // List members
            $record->listMembers = $record->listMembers->map(function($meetingMember){
                return [
                    'id' => $meetingMember->id ,
                    'role' => $meetingMember->role ,
                    'group' => $meetingMember->group ,
                    'remark' => $meetingMember->remark ,
                    'member' => $meetingMember->member == null ? null : [ 
                        'id' => $meetingMember->member->id , 
                        'firstname' => $meetingMember->member->firstname , 
                        'lastname' => $meetingMember->member->lastname
                    ] ,
                    'attendant' => $meetingMember->attendant == null ? null :
                        [ 
                            'id' => $meetingMember->attendant->id , 
                            'checktime' => $meetingMember->attendant->checktime , 
                            'remark' => $meetingMember->attendant->remark , 
                            'member' => $meetingMember->attendant->member == null ? null : 
                            [ 
                                'id' => $meetingMember->attendant->member->id , 
                                'firstname' => $meetingMember->attendant->member->firstname , 
                                'lastname' => $meetingMember->attendant->member->lastname
                            ] 
                        ]
                ];
            });
            return $record ;
        }) ,
        'totalMeetingsByTypes' => $builder->selectRaw('type_id, count(type_id) as total')->groupby('type_id','people_id','meeting_id')->get()->map(function($meeting) {
          return [
              'type' => [
                  'id' => $meeting->type->id ,
                  'name' => $meeting->type->name ,
              ],
              'total' => $meeting->total
          ];
        })
      ];
    });
  }
}
