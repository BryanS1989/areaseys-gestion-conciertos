<?php

use App\Recinto;
use Illuminate\Database\Seeder;

class RecintosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recinto1 = new Recinto();

        $recinto1->nombre = 'Palau Sant Jordi' ;
        $recinto1->coste_alquiler = 30000.00 ;
        $recinto1->precio_entrada = 10.00 ;

        $recinto1->save();

        $recinto2 = new Recinto();

        $recinto2->nombre = 'Wizink Center' ;
        $recinto2->coste_alquiler = 50000.00 ;
        $recinto2->precio_entrada = 20.00 ;

        $recinto2->save();
    }
}
