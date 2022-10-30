<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid'); 
            $table->unsignedBigInteger('id_miembro');
            $table->foreign('id_miembro')->references('id')->on('miembros');
            $table->text('enfermedad'); 
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->references('id')->on('medicos');
            $table->text('observaciones'); 
            $table->date('fecha_atencion');
            $table->text('medicamentos_recetados'); 
            $table->text('acompaniante'); 
            $table->integer('telefono_acompaniante');
            $table->text('tipo_acompaniante'); 
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
        Schema::dropIfExists('pacientes');
    }
}
