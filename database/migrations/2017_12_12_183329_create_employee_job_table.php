<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_job', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        
            $table->integer('job_id')->unsigned();
            $table->integer('employee_id')->unsigned();

            # Make foreign keys
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_job');
    }
}
