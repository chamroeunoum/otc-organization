<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopmessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popmessage', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable(true)->comment('The title of the message');
            $table->text('description')->nullable(true)->comment('The description of the message');
            $table->text('alert_type')->nullable(true)->comment('The alert type of the message');
            $table->text('hidecheck')->nullable(true)->comment('The hidecheck of the message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popmessage');
    }
}
