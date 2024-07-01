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
        if( Schema::hasTable('organization_people') ){
            Schema::table('organization_people',function(Blueprint $table){
                if( !Schema::hasColumn( 'organization_people' , 'code' ) ){
                    $table->string('code',50)->nullable(true)->comment('The prefix of the code which use to indentify the officer of an organization.');
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
        if( Schema::hasTable('organization_people') ){
            Schema::table('organization_people',function(Blueprint $table){
                if( Schema::hasColumn(  'organization_people' , 'code' ) ){
                    $table->dropColumn('code');
                }
            });
        }
    }
};
