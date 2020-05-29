<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->unique();
            $table->string('company_ruc')->unique()->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_description')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('url_merchant')->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
