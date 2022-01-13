<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanques', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('largo');
            $table->smallInteger('ancho');
            $table->smallInteger('alto');
            $table->smallInteger('capacidad');
            $table->smallInteger('numero_uso');
            $table->string('observacion', 150)->nullable();
            $table->double('latitud', 17, 15);
            $table->double('longitud', 17, 15);
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('almacen_id');
            $table->timestamps();

            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('almacen_id')
                ->references('id')
                ->on('almacenes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanques');
    }
}
