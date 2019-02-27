<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->default(11);
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->longText('data');
            $table->longText('data_extra');
            $table->string('slug');
            $table->string('video');
            $table->string('predefined');
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
        Schema::dropIfExists('services');
    }
}
