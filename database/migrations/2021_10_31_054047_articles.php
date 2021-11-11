<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('image');
            $table->integer('hit')->default(0);
            $table->boolean('durum')->default(0);
            $table->unsignedBigInteger('catagoryIdFk');
            $table->timestamps();

            $table->foreign('catagoryIdFk')
                ->references('id')
                ->on('catagories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
