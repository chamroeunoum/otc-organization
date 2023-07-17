<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TrackPerformance {
  private static $blockPerformances = [] ;
  public static function start($blockCodeName){
    static::$blockPerformances[ $blockCodeName ]['start'] = static::$blockPerformances[ $blockCodeName ]['end'] = microtime(TRUE);
  }
  public static function end($blockCodeName){
    static::$blockPerformances[ $blockCodeName ]['end'] = microtime(TRUE);
    static::$blockPerformances[ $blockCodeName ]['time'] = static::$blockPerformances[ $blockCodeName ]['end'] - static::$blockPerformances[ $blockCodeName ]['start'] ;
  }
  public static function save(){
    /**
     * Define the path to the file
     */
    // $path = storage_path('logs') . '/performance-'.\Carbon\Carbon::now()->format('Y-m-d').'.log' ;
    $path = storage_path('logs') . '/performance.log' ;
    // Let's make sure the file exists and is writable first.
    if (is_writable($path)) {
      // In our example we're opening $filename in append mode.
      // The file pointer is at the bottom of the file hence
      // that's where $somecontent will go when we fwrite() it.
      if (!$fp = fopen($path, 'a+')) {
          echo "Cannot open file ($path)";
          exit;
      }
      // Write $somecontent to our opened file.
      if (fwrite($fp, json_encode( static::$blockPerformances ) . PHP_EOL ) === FALSE) {
          echo "Cannot write to file ($path)";
          exit;
      }
      fclose($fp);
    } else {
      echo "The file $path is not writable";
    }
  }
}