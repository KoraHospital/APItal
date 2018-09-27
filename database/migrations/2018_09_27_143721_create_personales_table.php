<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->increments('id_personal');
            $table->string('nombre');
            $table->string('apellido_materno');
            $table->string('apellido_paterno');
            $table->date('fecha_nacimiento');
            $table->string('rol');
            $table->string('turno');
            $table->string('telefono');
            $table->string('direccion');
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
        Schema::dropIfExists('personales');
    }
}
