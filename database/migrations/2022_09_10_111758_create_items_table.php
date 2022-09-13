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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->unsignedBigInteger('tipo_items_id')->nullable();   //campo  a relacionar 1 item tiene 1 tipo - 1 tipo tiene N item (1-N)
            $table->bigInteger('defensa');
            $table->bigInteger('ataque');
            $table->boolean('activo')->default(false);

            $table->foreign('tipo_items_id')->references('id')->on('tipo_items')->onDelete('set Null');

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
        Schema::dropIfExists('items');
    }
};
