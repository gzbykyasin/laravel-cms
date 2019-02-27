<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('slug');
            $table->string('predefined');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('google');
            $table->string('address');
            $table->string('email');
            $table->string('phone_mobile');
            $table->string('phone_fixed');
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
        Schema::dropIfExists('configs');
    }
}
