<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doctor_id');
            $table->string('p_name');
            $table->string('p_email');
            $table->string('p_pass')->default('1234');
            $table->string('p_phone');
            $table->string('p_location');
            $table->string('p_age');
            $table->string('p_gender');
            $table->string('p_problem');
            $table->string('p_medicine');
            $table->string('visit_date');
            $table->string('req_message')->default('Nothing');
            $table->integer('req_status')->default(1);
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
        Schema::dropIfExists('prescriptions');
    }
}
