<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_materno');
            $table->string('apellido_paterno');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('tipo_sangre');
            $table->double('peso', 5, 2);
            $table->double('estatura', 3, 1);
            $table->integer('edad');
            $table->string('afiliacion');
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
