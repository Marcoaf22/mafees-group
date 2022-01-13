<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparaciones', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('cantidad');
            $table->date('fecha')->nullable();
            $table->boolean('estado')->default(false);
            // $table->unsignedBigInteger('tanque_ibc_id');
            $table->timestamps();

            $table->foreignId('tanque_id')->constrained('tanques');

            // $table->foreign('tanque_ibc_id')
            //     ->references('id')
            //     ->on('tanques_ibc')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preparaciones');
    }
}
