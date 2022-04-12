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
        Schema::create('liquidacion', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('placa');
            $table->bigInteger('id_cliente')->unsigned();
            $table->string('tipo_automotor');
            $table->integer('nro_servicios');
            $table->string('servicios');
            $table->date('fecha_despacho');
            $table->string('mora');
            $table->integer('total_servicios');
            $table->string('descuento');
            $table->integer('total');
            $table->bigInteger('id_acesor')->unsigned();
            $table->timestamps();

            $table->foreign('id_acesor')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('automotor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquidacion');
    }
};
