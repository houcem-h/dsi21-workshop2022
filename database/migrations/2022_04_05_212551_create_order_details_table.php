<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('quantity');
            $table->double('price',10,3);
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
        Schema::dropIfExists('order_details');
    }
}
