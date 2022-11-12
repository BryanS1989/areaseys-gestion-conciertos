<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_conciertos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_grupo')
                    ->unsigned();

            $table->bigInteger('id_concierto')
                    ->unsigned();

            // Foreign Keys
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->foreign('id_concierto')->references('id')->on('conciertos');

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
        Schema::dropIfExists('grupos_conciertos');
    }
}
