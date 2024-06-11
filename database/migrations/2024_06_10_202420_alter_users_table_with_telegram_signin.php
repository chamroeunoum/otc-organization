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
                if( !Schema::hasColumn( 'users' , 'telegram_user_id' ) ){
                    $table->string('telegram_user_id',191)->nullable(true)->comment('The user id of the telegram account');
                }
                if( !Schema::hasColumn( 'users' ,  'telegram_user_auth_date' ) ){
                    $table->string('telegram_user_auth_date',191)->nullable(true)->comment('The user auth date of the telegram account');
                }
                if( !Schema::hasColumn( 'users' ,  'telegram_user_hash' ) ){
                    $table->string('telegram_user_hash',191)->nullable(true)->comment('The user email of the telegram account');
                }
                if( !Schema::hasColumn(  'users' , 'telegram_user_firstname' ) ){
                    $table->string('telegram_user_firstname',191)->nullable(true)->comment('The user firstname of the telegram account');
                }
                if( !Schema::hasColumn( 'users' ,  'telegram_user_lastname' ) ){
                    $table->string('telegram_user_lastname',191)->nullable(true)->comment('The user lastname of the telegram account');
                }
                if( !Schema::hasColumn( 'users' ,  'telegram_user_username' ) ){
                    $table->string('telegram_user_username',191)->nullable(true)->comment('The user fullname of the telegram account');
                }
                if( !Schema::hasColumn(  'users' , 'telegram_user_picture' ) ){
                    $table->string('telegram_user_picture',191)->nullable(true)->comment('The user profile picture of the telegram account');
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
                if( Schema::hasColumn( 'users' , 'telegram_user_id' ) ){
                    $table->dropColumn('telegram_user_id');
                }
                if( Schema::hasColumn( 'users' ,  'telegram_user_auth_date' ) ){
                    $table->dropColumn('telegram_user_auth_date');
                }
                if( Schema::hasColumn( 'users' ,  'telegram_user_hash' ) ){
                    $table->dropColumn('telegram_user_hash');
                }
                if( Schema::hasColumn(  'users' , 'telegram_user_firstname' ) ){
                    $table->dropColumn('telegram_user_firstname');
                }
                if( Schema::hasColumn( 'users' ,  'telegram_user_lastname' ) ){
                    $table->dropColumn('telegram_user_lastname');
                }
                if( Schema::hasColumn( 'users' ,  'telegram_user_username' ) ){
                    $table->dropColumn('telegram_user_username');
                }
                if( Schema::hasColumn(  'users' , 'telegram_user_picture' ) ){
                    $table->dropColumn('telegram_user_picture');
                }
            });
        }
    }
};
