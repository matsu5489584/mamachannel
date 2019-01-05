<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // タイトルを保存するカラム
            $table->string('body');  // 本文を保存するカラム
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
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
        Schema::dropIfExists('topicfiles');
    }
}
