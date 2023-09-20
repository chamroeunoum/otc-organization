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
        Schema::create('error_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('The authenticated user that face the error.');
            $table->string('app_name')->nullable()->comment('The name of app.');
            $table->string('module_name')->nullable()->comment('The module that error occurred in the client side app.');
            $table->string('page_name')->nullable()->comment('The page that error occurred in the client side app.');
            $table->text('user_agent')->nullable()->comment('Browser');
            $table->text('desp')->nullable()->comment('The details information of the error.');
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
        Schema::dropIfExists('error_details');
    }
};
