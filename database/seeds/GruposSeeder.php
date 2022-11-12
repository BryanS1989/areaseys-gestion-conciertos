<?php

use App\Grupo;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rollingStones = new Grupo();

        $rollingStones->nombre = 'Rolling Stones';
        $rollingStones->cache = 10000.00;

        $rollingStones->save();

        $acdc = new Grupo();

        $acdc->nombre = 'AC DC';
        $acdc->cache = 5000.00;

        $acdc->save();

        $gunsNRoses = new Grupo();

        $gunsNRoses->nombre = 'Guns & Roses';
        $gunsNRoses->cache = 5000.00;

        $gunsNRoses->save();
    }
}
