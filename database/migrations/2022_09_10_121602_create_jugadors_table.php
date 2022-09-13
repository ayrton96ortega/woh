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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->unique();

            $table->unsignedBigInteger('tipo_jugador_id')->nullable();//veer
            $table->bigInteger('vida')->default(100);
            //$table->char('item');//veer  porque tiene 1 relacion mas
            $table->boolean('activo')->default(false);
            $table->unsignedBigInteger('ataque_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipo_jugador_id')->references('id')->on('tipo_jugadors')->onDelete('set Null');
            $table->foreign('ataque_id')->references('id')->on('ataques')->onDelete('set Null');



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
        Schema::dropIfExists('jugadors');
    }
};
