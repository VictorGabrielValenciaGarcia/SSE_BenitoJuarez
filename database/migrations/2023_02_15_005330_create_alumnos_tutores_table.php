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
        Schema::create('alumnos_tutores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_alumno')
                ->nullable()
                ->constrained('alumnos')
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');

            $table->foreignId('id_tutor')
                ->nullable()
                ->constrained('tutores')
                ->onUpdate('cascade')
                ->nullOnDelete('cascade');

            $table->enum('parentesco', ['PADRE', 'MADRE', 'DE CONFIANZA']);

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
        Schema::dropIfExists('alumnostutores');
    }
};
