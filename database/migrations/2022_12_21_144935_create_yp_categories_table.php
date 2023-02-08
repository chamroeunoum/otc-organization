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
        Schema::create('yp_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',191)->nullable(false)->comment('The name of the category');
            $table->text('desp')->nullable(true)->comment('The description of the category');
            $table->integer('pid')->nullable(true)->default(0)->comment('The id of the parent category');
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
        Schema::dropIfExists('yp_categories');
    }
};
