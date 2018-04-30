<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age');
            $table->integer('phone');
            $table->string('experience');
            $table->string('skills');
            $table->string('designation');
            $table->string('expected_salary');
            $table->string('currunt_location');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('job_seekers');
    }
}
