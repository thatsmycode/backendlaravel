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
        Schema::create('fitas', function (Blueprint $table) {
            $table->id();
            $table->decimal('lat', 9, 7);
            $table->decimal('long', 9, 7);
            $table->unsignedBigInteger('partida_id');
            $table->foreign('partida_id')->references('id')->on('partidas')
            ->onUpdate('cascade')->onDelete('cascade');    
            $table->unsignedBigInteger('tipus_id');
            $table->foreign('tipus_id')->references('id')->on('tipus_fitas')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fita');
    }
};
