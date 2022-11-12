<?php

use App\Medio;
use Illuminate\Database\Seeder;

class MediosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medio1 = new Medio();

        $medio1->nombre = '20minutos';

        $medio1->save();

        $medio2 = new Medio();

        $medio2->nombre = 'Rock FM';

        $medio2->save();
    }
}
