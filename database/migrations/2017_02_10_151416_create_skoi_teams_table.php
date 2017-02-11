<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkoiTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skoi_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('school');
            $table->string('teacher_name');
            $table->string('teacher_phone_number');
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
        Schema::dropIfExists('skoi_teams');
    }
}
