<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type');
            $table->string('vehicle_make');
            $table->string('vehicle_plate');
            $table->string('vehicle_year');
            $table->string('vehicle_description');
            $table->string('url_vehicle')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->enum('status',['aprobado','denegado','revision'])->default('aprobado');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_men');
    }
}
