<?php

namespace Database\Seeders;

use App\Models\Lote;
use Illuminate\Database\Seeder;

class LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lote::create([
            'numero_lote' => 145287,
            'producto_id' => 1,
        ]);
        Lote::create([
            'numero_lote' => 1245896,
            'producto_id' => 1,

        ]);
        Lote::create([
            'numero_lote' => 325485,
            'producto_id' => 1,

        ]);
        Lote::create([
            'numero_lote' => 658932,
            'producto_id' => 1,

        ]);
    }
}
