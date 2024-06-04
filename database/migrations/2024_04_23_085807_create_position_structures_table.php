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
        Schema::create('position_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->default(0)->comment('The id of the organization that own the position structure');
            $table->string('desp',191)->nullable(true)->comment('The description of the position structures');
            $table->integer('position_id')->nullable(false)->comment('The ID of the position from Tags table' );
            $table->integer('parent_id')->default(0)->comment('The ID of the parent position refer to the id of this table' );
            $table->integer('child_id')->default(0)->comment('The ID of the child position refer to the id of this table' );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_structures');
    }
};
