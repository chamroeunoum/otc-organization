<?php

namespace App\Models;

class UserAccess extends SpatieRole
{

  private $fields = [];

  private function createAccessFile(){
    // Check whether the folder does exist
    if( file_exists( storage_path() . 'logs' ) ){
      
    }
    // Create logs folder

    // Create file log for today
  }

}