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
        Schema::create('servicio', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('tipo_servicio')->unsigned();
            $table->bigInteger('tipo_automotor')->unsigned();
            $table->integer('costo');
            $table->timestamps();
            
            $table->foreign('tipo_servicio')->references('id')->on('tipo_servicio')->onDelete('cascade');
            $table->foreign('tipo_automotor')->references('id')->on('tipo_automotor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio');
    }
};
