<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('sex_id')->unsigned()->index()->nullable();
            $table->foreign('sex_id')->references('id')->on('sexes');

            $table->integer('school_id')->unsigned()->index()->nullable();
            $table->foreign('school_id')->references('id')->on('schools');

            $table->integer('major_id')->unsigned()->index()->nullable();
            $table->foreign('major_id')->references('id')->on('majors');

            $table->integer('year_id')->unsigned()->index()->nullable();
            $table->foreign('year_id')->references('id')->on('years');

            $table->integer('province_id')->unsigned()->index()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');

            $table->string('name', 50)->default('')->nullable();
            $table->string('dob')->nullable();
            $table->string('avatar', 250)->nullable();
            $table->string('workplace', 250)->nullable();

            $table->integer('creator_id')->unsigned()->index()->nullable();
            $table->integer('updater_id')->unsigned()->index()->nullable();
            $table->integer('deleter_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
