<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( Schema::hasTable('attendant_check_times') ){
            Schema::table('attendant_check_times',function(Blueprint $table){
                if( !Schema::hasColumn( 'attendant_check_times' , 'lat' ) ){
                    $table->string('lat',50)->nullable(true)->comment('The latitute of the map coordination');
                }
                if( !Schema::hasColumn( 'attendant_check_times' , 'lng' ) ){
                    $table->string('lng',50)->nullable(true)->comment('The longitute of the map coordination');
                }
                if( !Schema::hasColumn( 'attendant_check_times' , 'photo' ) ){
                    $table->string('photo',191)->nullable(true)->comment('The photo at the session of check attendant');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if( Schema::hasTable('attendant_check_times') ){
            Schema::table('attendant_check_times',function(Blueprint $table){
                if( Schema::hasColumn(  'attendant_check_times' , 'lat' ) ){
                    $table->dropColumn('lat');
                }
                if( Schema::hasColumn(  'attendant_check_times' , 'lng' ) ){
                    $table->dropColumn('lng');
                }
                if( Schema::hasColumn(  'attendant_check_times' , 'photo' ) ){
                    $table->dropColumn('photo');
                }
            });
        }
    }
};
