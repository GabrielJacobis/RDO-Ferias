<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climas', function (Blueprint $table) {
            $table->id();
            $table->string('clima')->unique(); // Bom, Chuva leve, Chuva forte
            $table->unsignedBigInteger('turnos_id'); // relacionar o turno com a condição do clima
            $table->timestamps();

             // Define a chave estrangeira
             $table->foreign('turnos_id')->references('id')->on('turnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('climas');
    }
}