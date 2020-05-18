<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('id_sub_category');
            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->decimal('purchase_price', 11, 2);
            $table->decimal('sale_price', 11, 2);
            $table->integer('stock');
            $table->string('description')->nullable();
            $table->string('url_image')->nullable();
            $table->enum('status',['activo','inactivo']);
            $table->timestamps();
            $table->foreign('id_sub_category')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
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
}
