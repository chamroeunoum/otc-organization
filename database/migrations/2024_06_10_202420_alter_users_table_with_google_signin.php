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
        if( Schema::hasTable('users') ){
            Schema::table('users',function(Blueprint $table){
                if( !Schema::hasColumn( 'users' , 'google_user_id' ) ){
                    $table->string('google_user_id',191)->nullable(true)->comment('The user id of the google account');
                }
                if( !Schema::hasColumn( 'users' ,  'google_user_phone' ) ){
                    $table->string('google_user_phone',191)->nullable(true)->comment('The user phone of the google account');
                }
                if( !Schema::hasColumn( 'users' ,  'google_user_email' ) ){
                    $table->string('google_user_email',191)->nullable(true)->comment('The user email of the google account');
                }
                if( !Schema::hasColumn(  'users' , 'google_user_firstname' ) ){
                    $table->string('google_user_firstname',191)->nullable(true)->comment('The user firstname of the google account');
                }
                if( !Schema::hasColumn( 'users' ,  'google_user_lastname' ) ){
                    $table->string('google_user_lastname',191)->nullable(true)->comment('The user lastname of the google account');
                }
                if( !Schema::hasColumn( 'users' ,  'google_user_fullname' ) ){
                    $table->string('google_user_fullname',191)->nullable(true)->comment('The user fullname of the google account');
                }
                if( !Schema::hasColumn(  'users' , 'google_user_picture' ) ){
                    $table->string('google_user_picture',191)->nullable(true)->comment('The user profile picture of the google account');
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
        if( Schema::hasTable('users') ){
            Schema::table('users',function(Blueprint $table){
                if( Schema::hasColumn(  'users' , 'google_user_id' ) ){
                    $table->dropColumn('google_user_id');
                }
                if( Schema::hasColumn(  'users' , 'google_user_phone' ) ){
                    $table->dropColumn('google_user_phone');
                }
                if( Schema::hasColumn(  'users' , 'google_user_email' ) ){
                    $table->dropColumn('google_user_email');
                }
                if( Schema::hasColumn(  'users' , 'google_user_firstname' ) ){
                    $table->dropColumn('google_user_firstname');
                }
                if( Schema::hasColumn(  'users' , 'google_user_lastname' ) ){
                    $table->dropColumn('google_user_lastname');
                }
                if( Schema::hasColumn( 'users' ,  'google_user_fullname' ) ){
                    $table->dropColumn('google_user_fullname');
                }
                if( Schema::hasColumn( 'users' ,  'google_user_picture' ) ){
                    $table->dropColumn('google_user_picture');
                }
            });
        }
    }
};
