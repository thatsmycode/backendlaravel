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
        Schema::create('combats', function (Blueprint $table) {
            $table->unsignedBigInteger('fita_id');
            $table->foreign('fita_id')->references('id')->on('fitas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('equip_id');
            $table->foreign('equip_id')->references('id')->on('equips')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('soldadets')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combat');
    }
};
