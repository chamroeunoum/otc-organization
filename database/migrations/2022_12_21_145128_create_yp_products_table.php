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
        Schema::create('yp_products', function (Blueprint $table) {
            $table->id();
            $table->string('name',191)->nullable(false)->comment('The name of the product');
            $table->string('phone',191)->nullable(false)->comment('The phone of the product');
            $table->integer('category')->nullable(false)->default(0)->comment('The category of the product');
            $table->text('address')->nullable(true)->comment('The id of the parent category');
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
        Schema::dropIfExists('yp_products');
    }
};
