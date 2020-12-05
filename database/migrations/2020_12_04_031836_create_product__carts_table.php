<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // PK
            $table->integer("cart_id")->unsigned();
//            $table->foreign("cart_id")->references("id")->on("carts");

            $table->integer("product_id")->unsigned();
//            $table->foreign("product_id")->references("id")->on("products");
            // -
            $table->integer("quantity");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__carts');
    }
}
