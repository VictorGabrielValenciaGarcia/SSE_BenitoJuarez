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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();

            $table->string('RFC', 13)->unique(); //UTTI212024
            $table->string('nombre', 30);
            $table->string('apellidoP', 20);
            $table->string('apellidoM', 20);
            $table->string('direccion',80)->default('Ninguna')->nullable();
            $table->string('correo',45)->unique();
            $table->string('password',80);
            $table->string('areaFormacion');
            $table->enum('sexo', ['H', 'M', 'NB']);
            $table->date('fechaIngreso')->nullable();
            $table->date('fechaBaja')->nullable();
            $table->string('telefono', 15);
            $table->foreignId('id_materia')
                    ->nullable()
                    ->constrained('materias')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('docentes');
    }
};
