<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_pdfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->default(11);
            $table->string('title');
            $table->string('slug');
            $table->enum('status',['active','pending','passive']);
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
        Schema::dropIfExists('customer_pdfs');
    }
}
