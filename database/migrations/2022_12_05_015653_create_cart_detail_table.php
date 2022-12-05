<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->double('qty', 12, 2)->default(0);
            $table->double('price', 12, 2)->default(0);
            $table->double('discount', 12, 2)->default(0);
            $table->double('subtotal', 12, 2)->default(0);
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
        Schema::dropIfExists('cart_detail');
    }
}
