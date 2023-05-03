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
        Schema::create('esdeveniments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partida_id');
            $table->foreign('partida_id')->references('id')->on('partidas')
            ->onUpdate('cascade')->onDelete('cascade');//fk partida
            $table->unsignedBigInteger('jugador_id');
            $table->foreign('jugador_id')->references('id')->on('jugadors')
            ->onUpdate('cascade')->onDelete('cascade');// fk partida
            $table->unsignedBigInteger('esdeveniment_id');
            $table->foreign('esdeveniment_id')->references('id')->on('tipus_esdeveniments')
            ->onUpdate('cascade')->onDelete('cascade');//fk tipus_esdeveniment
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
        Schema::dropIfExists('esdeveniment');
    }
};
