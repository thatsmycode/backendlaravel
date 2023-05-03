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
        Schema::table('partidas', function (Blueprint $table){
            $table->unsignedBigInteger('mapa_id')->after('duracio');
            $table->foreign('mapa_id')->references('id')->on('mapas')
            ->onUpdate('cascade')->onDelete('cascade');
        });

         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->dropColumn('mapa_id');
        });
    }
};
