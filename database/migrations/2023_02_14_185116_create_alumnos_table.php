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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 11)->unique(); //UTTI212024
            $table->string('nombre', 30);
            $table->string('apellidoP', 20);
            $table->string('apellidoM', 20);

            $table->string('direccion',80)->default('Ninguna')->nullable();
            $table->string('CURP',18)->unique();
            $table->string('discapacidades')->default('Ninguna')->nullable();

            $table->foreignId('id_grupo')
                    ->nullable()
                    ->constrained('grupos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->enum('sexo', ['H', 'M', 'NB']);
            $table->integer('edad');

            $table->date('fechaEgreso')->nullable();

            $table->date('fechaRegistro')->nullable();
            $table->string('password',80);
            $table->string('correo',45)->unique();
            $table->decimal('promedio', $precision = 2, $scale = 1)->default(0.0);

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
        Schema::dropIfExists('alumnos');
    }
};
