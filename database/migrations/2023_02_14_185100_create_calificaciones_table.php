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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();

            $table->decimal('parcialUno', $precision = 3, $scale = 1)->default(0.0)->nullable();
            $table->decimal('parcialDos', $precision = 3, $scale = 1)->default(0.0)->nullable();
            $table->decimal('parcialTres', $precision = 3, $scale = 1)->default(0.0)->nullable();
            $table->decimal('promedioFinal', $precision = 3, $scale = 1)->default(0.0)->nullable();

            $table->foreignId('id_materia')
            ->nullable()
            ->constrained('materias')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('id_alumno')
            ->nullable()
            ->constrained('alumnos')
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
        Schema::dropIfExists('calificaciones');
    }
};
