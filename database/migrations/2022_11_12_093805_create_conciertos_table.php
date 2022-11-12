<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_promotor')
                    ->unsigned();

            $table->bigInteger('id_recinto')
                    ->unsigned();

            $table->string('nombre', 100);

            $table->integer('numero_espectadores');

            $table->date('fecha');

            $table->float('rentabilidad', 8, 2);

            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_promotor')->references('id')->on('promotores');
            $table->foreign('id_recinto')->references('id')->on('recintos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conciertos');
    }
}
