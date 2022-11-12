<?php

use App\Promotor;
use Illuminate\Database\Seeder;

class PromotoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promotor = new Promotor();

        $promotor->nombre = 'Bryan';

        $promotor->save();
    }
}
