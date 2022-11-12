<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedioConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medios_conciertos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_medio')
                ->unsigned();

            $table->bigInteger('id_concierto')
                ->unsigned();

            // Foreign Keys
            $table->foreign('id_medio')->references('id')->on('medios');
            $table->foreign('id_concierto')->references('id')->on('concierto');

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
        Schema::dropIfExists('medios_conciertos');
    }
}
