<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePreparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_preparaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preparacion_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->timestamps();



            $table->foreign('preparacion_id')
                ->references('id')
                ->on('preparaciones')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
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
        Schema::dropIfExists('detalle_preparaciones');
    }
}
