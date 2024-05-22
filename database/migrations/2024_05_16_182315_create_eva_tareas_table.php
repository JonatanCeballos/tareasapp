<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eva_tareas', function (Blueprint $table) {
            $table->id('id');
            $table->timestamp('tareaFechaCreacion');
            $table->date('tareaFechaLimite');
            $table->string('tareaDescripcion', 200);
            $table->string('tareaEstado', 12);
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
        Schema::dropIfExists('eva_tareas');
    }
}
