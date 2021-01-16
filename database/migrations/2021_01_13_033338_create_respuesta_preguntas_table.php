<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_de_preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('opciones_de_respuesta_id');
            $table->string('descripcion');
            $table->timestamps();
            
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('opciones_de_respuesta_id')->references('id')->on('opciones_de_respuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_preguntas');
    }
}
