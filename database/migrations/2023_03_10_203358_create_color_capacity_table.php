<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_capacity', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('capacity_id');
            /*Si eliminamos la capacidad a la cual hace referencia tambien se eliminan los registros de esta tabla intermedia con el onDelete('cascade')*/
            $table->foreign('capacity_id')->references('id')->on('capacities')->onDelete('cascade');

            $table->integer('quantity');

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
        Schema::dropIfExists('color_capacity');
    }
}
