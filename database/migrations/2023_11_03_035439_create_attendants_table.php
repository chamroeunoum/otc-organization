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
        Schema::create('attendants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false)->comment('The ID of the user/staff');
            $table->date('date')->nullable(false)->comment('The date of the attendant');
            $table->double('worked_hours',8,4)->default(0)->comment('The number of hours worked in a day');
            $table->double('worked_minutes',8,4)->default(0)->comment('The number of minutes worked in a day');
            $table->double('ot_hours',8,4)->default(0)->comment('The number of hours worked in a day');
            $table->double('ot_minutes',8,4)->default(0)->comment('The number of minutes worked in a day');
            $table->string('attendant_type',100)->default('P')->comment('The type of the attendant such as Absent -> A , Annual Leave -> AL , Sick Leave -> SL , Present -> P , Present Early -> PE , Present Late -> PL , Permission -> PM , Maternity Leave -> ML ');
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
        Schema::dropIfExists('attendant_attendants');
    }
};
