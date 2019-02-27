<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->default(11);
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('icerik_title');
            $table->mediumText('icerik_description');
            $table->string('youtube');
            $table->string('youtube_title');
            $table->mediumText('youtube_description');
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
        Schema::dropIfExists('home_pages');
    }
}
