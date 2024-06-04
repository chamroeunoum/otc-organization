<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function folders(){
        return $this->belongsToMany(\App\Models\Folder\Folder::class,'file_folders','file_id','folder_id');
    }
}
