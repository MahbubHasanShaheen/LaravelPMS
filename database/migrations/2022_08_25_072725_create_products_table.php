<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('sup_id');
            $table->string('brand');
            $table->string('product_code');
            $table->string('waranty');
            $table->string('product_qty');
            $table->string('product_garage');
            $table->string('product_route');
            $table->string('product_image');
            $table->string('purchase_date');
            $table->string('expire_date');
            $table->string('purchase_price');
            $table->string('selling_price');
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
        Schema::dropIfExists('products');
    }
};
