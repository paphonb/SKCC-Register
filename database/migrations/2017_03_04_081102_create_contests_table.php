<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     * TODO: Foreign keys
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Untitled Contest');
            $table->text('description')->nullable();
            $table->string('language')->default('cpp');
            $table->dateTimeTz('start')->nullable();
            $table->dateTimeTz('end')->nullable();
            $table->time('extra_time')->nullable()->default(null);
            $table->string('controller')->default('normal');
            $table->timestamps();
        });
        Schema::create('contest_config', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('contest_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('contest_task', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->unsignedInteger('task_id');
            $table->integer('score_factor')->default(1);
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('contest_submission', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->unsignedInteger('submission_id');
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('cascade');
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
        Schema::dropIfExists('contest_submission');
        Schema::dropIfExists('contest_task');
        Schema::dropIfExists('contest_user');
        Schema::dropIfExists('contest_config');
        Schema::dropIfExists('contests');
    }
}
