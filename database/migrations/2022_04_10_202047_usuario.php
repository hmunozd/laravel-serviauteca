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
        Schema::create('usuario', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('cc');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('clave');
            $table->string('email')->unique();
            $table->string('tel');
            $table->bigInteger('tipo_usuario')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_usuario')->references('id')->on('tipo_usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
