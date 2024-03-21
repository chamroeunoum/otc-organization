<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    public function task(){
        return $this->belongsTo( Task::class , 'task_id', 'id' );
    }
    public function commentor(){
        return $this->belongsTo( People::class , 'people_id', 'id' );
    }
}
