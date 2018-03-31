<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', 11);
            
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('users_type');

            $table->string('phone', 50)->unique();
            $table->boolean('is_email_verified')->default(0);
            $table->string('email', 50)->unique()->nullable();
            $table->boolean('is_phone_verified')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('users');
    }
}
