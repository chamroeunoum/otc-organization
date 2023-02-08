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
        Schema::create('yp_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name',191)->nullable(false)->comment('The unique name');
            $table->text('label')->nullable(false)->comment('The description of the tag');
            $table->integer('pid')->nullable(true)->default(0)->comment('The id of the parent of this tag');
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
        Schema::dropIfExists('yp_tags');
    }
};
