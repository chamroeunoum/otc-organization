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
        if( Schema::hasTable('tags') ){
            Schema::table('tags',function(Blueprint $table){
                if( !Schema::hasColumn( 'tags' , 'organization_code' ) ){
                    $table->string('organization_code',191)->nullable(true)->comment('The identification number of the organization.');
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
        if( Schema::hasTable('tags') ){
            Schema::table('tags',function(Blueprint $table){
                if( Schema::hasColumn(  'tags' , 'organization_code' ) ){
                    $table->dropColumn('organization_code');
                }
            });
        }
    }
};
