<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('marca', 50)->nullable();
            $table->string('presentacion', 200);
            $table->string('descripcion', 200);
            $table->integer('codigo');
            $table->integer('numero_unidades');
            $table->integer('precio');
            $table->boolean('estado');
            $table->unsignedBigInteger('almacen_id');
            $table->unsignedBigInteger('presentacion_id');
            $table->unsignedBigInteger('lote_id');
            $table->timestamps();

            $table->foreign('almacen_id')
                ->references('id')
                ->on('almacenes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('presentacion_id')
                ->references('id')
                ->on('presentaciones')
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
        Schema::dropIfExists('productos');
    }
}
