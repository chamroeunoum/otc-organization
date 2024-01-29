<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleCountesiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_countesies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('people_id')->nullable(false)->comment('The id of the user which is assigned the countesy.');
            $table->integer('countesy_id')->nullable(false)->default(0)->comment('The countesy id that is assigned to a user.');
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
        Schema::dropIfExists('people_countesies');
    }
};
