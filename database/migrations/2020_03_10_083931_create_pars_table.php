<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_ref_number');
            $table->date('date_received');
            $table->string('type_of_transmittal');
            $table->string('origin');
            $table->string('subject');
            $table->string('rds_instruction');
            $table->string('route_to');
            $table->date('date_released');
            $table->string('action');
            $table->integer('year');
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
        Schema::dropIfExists('pars');
    }
}
