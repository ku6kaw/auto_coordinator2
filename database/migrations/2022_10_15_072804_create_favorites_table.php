<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); # 外部キー
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

             $table->unsignedBigInteger('cloth_id'); # 外部キー
            $table->foreign('cloth_id')->references('id')->on('clothes')->onDelete('cascade');

             $table->unsignedBigInteger('pants_id'); # 外部キー
            $table->foreign('pants_id')->references('id')->on('pants')->onDelete('cascade');

             $table->unsignedBigInteger('jacket_id')->nullable(); # 外部キー
            $table->foreign('jacket_id')->references('id')->on('jackets')->onDelete('cascade');
            /*外部キー結合してjacketだけnullもオッケーにしている*/

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
        Schema::dropIfExists('favorites');
    }
};
