<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoniaDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coloniadatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreColonia');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->string('Logo');
            $table->integer('AportacionMensual');
            $table->string('email_colonia');
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
        Schema::dropIfExists('coloniadatos');
    }
}
