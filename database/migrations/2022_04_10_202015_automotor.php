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
        Schema::create('automotor', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('placa');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('tipo_automotor')->unsigned();
            $table->integer('nro_servicios');
            $table->string('servicios');
            $table->integer('total_servicios');
            $table->dateTime('hora_inicio')->useCurrent();
            $table->dateTime('hora_final');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
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
        Schema::dropIfExists('automotor');
    }
};
