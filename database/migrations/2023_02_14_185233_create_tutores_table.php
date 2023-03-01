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
        Schema::create('tutores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('apellidoP', 20);
            $table->string('apellidoM', 20);

            $table->enum('sexo', ['H', 'M', 'NB']);
            $table->string('telefono', 30);
            $table->string('telefonoCasa', 30);
            $table->string('direccion',80)->default('Ninguna')->nullable();

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
        Schema::dropIfExists('tutores');
    }
};
