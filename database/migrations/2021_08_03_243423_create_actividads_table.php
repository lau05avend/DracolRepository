<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->id('id');
            $table->string('NombreActividad',60);
            $table->string('DescripcionActividad',255);
            $table->dateTime('FechaInicioA');
            $table->dateTime('FechaFinA');
            $table->unsignedTinyInteger('CantidadDias')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unsignedTinyInteger('estado_actividad_id')->default(1);
            $table->unsignedTinyInteger('fase_tarea_id');
            $table->unsignedBigInteger('obra_id');

            $table->foreign("estado_actividad_id")
                ->references("id")->on("estado_actividads");

            $table->foreign("fase_tarea_id")
                ->references("id")->on("fase_tareas");

            $table->foreign("obra_id")
                ->references("id")->on("obras");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividads');
    }
}
