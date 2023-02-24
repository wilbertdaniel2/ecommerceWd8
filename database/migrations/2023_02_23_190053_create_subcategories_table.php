<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('image');

            /*El valor por defecto sera falso, dado el caso de que no se especifique un valor
            para alguno de estos campos se dara a entender de que estos campos no son necesarios
            */
            $table->boolean('color')->default(false);
            $table->boolean('capacity')->default(false);
            $table->boolean('detail')->default(false);
            $table->boolean('grid')->default(false);
            $table->boolean('camera')->default(false);
            $table->boolean('screen')->default(false);


            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');





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
        Schema::dropIfExists('subcategories');
    }
}
