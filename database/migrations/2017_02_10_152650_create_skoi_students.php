<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkoiStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skoi_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->string('name_prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('grade_level');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook');
            $table->foreign('team_id')->references('id')->on('skoi_teams')->onDelete('cascade');
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
        Schema::dropIfExists('skoi_students');
    }
}
