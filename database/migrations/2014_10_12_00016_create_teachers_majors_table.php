<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_majors', function (Blueprint $table) {
            $table->increments('id', 11);

            $table->integer('teacher_id')->unsigned()->index()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->integer('major_id')->unsigned()->index()->nullable();
            $table->foreign('major_id')->references('id')->on('majors');

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
