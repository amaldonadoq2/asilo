<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('uuid'); 
            $table->string('cui'); 
            $table->text('nombre');
            $table->text('apellido');
            $table->text('encargado');
            $table->text('direccion');
            $table->integer('telefono');
            $table->text('enfermedades');
            $table->unsignedBigInteger('id_tipo_sangre');
            $table->foreign('id_tipo_sangre')->references('id')->on('tipos_sangre');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')->references('id')->on('generos');
            $table->unsignedBigInteger('id_estado_civil');
            $table->foreign('id_estado_civil')->references('id')->on('estados_civil');
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
        Schema::dropIfExists('miembros');
    }
}
