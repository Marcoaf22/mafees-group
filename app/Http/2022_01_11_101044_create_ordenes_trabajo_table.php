<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajo', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion', 100);
            $table->integer('duracion');
            $table->double('latitud', 17, 15)->nullable();
            $table->double('longitud', 17, 15)->nullable();
            $table->unsignedBigInteger('preparacion_id');
            $table->timestamps();

            $table->foreign('preparacion_id')
                ->references('id')
                ->on('preparaciones')
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
        Schema::dropIfExists('ordenes_trabajo');
    }
}
