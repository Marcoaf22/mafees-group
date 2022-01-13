<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->date('fecha');
            $table->string('estado');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('empleado_id');
            $table->timestamps();

            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedores')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
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
        Schema::dropIfExists('ingresos');
    }
}
