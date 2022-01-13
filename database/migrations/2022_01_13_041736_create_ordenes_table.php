<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->integer('duracion');
            $table->string('estado', 50)->default('Sin asignar');
            $table->string('comentario', 150)->nullable();
            $table->double('latitud', 17, 15)->nullable();
            $table->double('longitud', 17, 15)->nullable();

            $table->foreignId('preparacion_id')->nullable()->constrained('preparaciones', 'id');
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('servicio_id')->constrained();

            // $table->foreign('preparacion_id')
            //     ->references('id')
            //     ->on('preparaciones')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();

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
        Schema::dropIfExists('ordenes');
    }
}
