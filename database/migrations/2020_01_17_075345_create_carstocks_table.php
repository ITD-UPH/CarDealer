<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id')->unique();
            $table->unsignedMediumInteger('current_stock');
            $table->unsignedMediumInteger('sold_stock')->default(0);
            $table->unsignedMediumInteger('total_stock');
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carstocks');
    }
}
