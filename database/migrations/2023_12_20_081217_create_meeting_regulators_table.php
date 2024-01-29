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
        Schema::create('meeting_regulators', function (Blueprint $table) {
            $table->id();
            $table->integer('meeting_id')->comment('The id of meeting table');
            $table->integer('regulator_id')->nullable(false)->comment('The id of regulator table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_regulators');
    }
};
