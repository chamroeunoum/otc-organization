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
        if( Schema::hasTable('attendants') ){
            Schema::table('attendants',function(Blueprint $table){
                if( !Schema::hasColumn( 'attendants' , 'organization_id' ) ){
                    $table->int('organization_id')->nullable(true)->comment('The id of an organization that this officer check attendant');
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
        if( Schema::hasTable('attendants') ){
            Schema::table('attendants',function(Blueprint $table){
                if( Schema::hasColumn( 'attendants' , 'organization_id' ) ){
                    $table->dropColumn('organization_id');
                }
            });
        }
    }
};
