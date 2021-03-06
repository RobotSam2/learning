<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
    Schema::create('product', function (Blueprint $table) {
            $table->increments('id', 30);

            $table->integer('cate_id')->unsigned()->index()->nullable();
            $table->foreign('cate_id')->references('id')->on('category');

            $table->string('title', 100);
            $table->string('price', 50);
            $table->string('description', 500);
            $table->string('feature_img', 100)->nullable();
            $table->string('image_pro', 100)->nullable();          
            $table->string('pro_not')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('creator_id')->unsigned()->index()->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::dropIfExists('product');
    }
}
