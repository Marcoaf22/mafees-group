<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('descripcion', 200);
            $table->string('direccion', 200);
            $table->double('latitud', 17, 15);
            $table->double('longitud', 17, 5);
            $table->integer('telefono');
            $table->boolean('principal');
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
        Schema::dropIfExists('almacenes');
    }
}
