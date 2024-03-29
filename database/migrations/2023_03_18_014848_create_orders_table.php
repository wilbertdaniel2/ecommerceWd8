<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Order;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('contact');
            $table->string('phone');

            $table->enum('status', [Order::PENDIENTE, Order::RECIBIDO, Order::ENVIADO, Order::ENTREGADO, Order::ANULADO])->default(Order::PENDIENTE);

            $table->enum('envio_type', [1, 2]);

            $table->float('shipping_cost');

            $table->float('total', 20);

            $table->json('content');

            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments');

            // $table->unsignedBigInteger('municipality_id')->nullable();
            // $table->foreign('municipality_id')->references('id')->on('municipalities');

            // $table->unsignedBigInteger('neighborhood_id')->nullable();
            // $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');

            // $table->string('address')->nullable();
            // $table->string('references')->nullable();

            $table->json('envio')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
