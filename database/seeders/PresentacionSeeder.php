<?php

namespace Database\Seeders;

use App\Models\Presentacion;
use Illuminate\Database\Seeder;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentacion::create([
            'nombre' => 'tambor pequeño',
            'peso' => 100,
            'unidad_medida' => 'kg'
        ]);
        Presentacion::create([
            'nombre' => 'bidon',
            'peso' => 25,
            'unidad_medida' => 'kg'
        ]);
        Presentacion::create([
            'nombre' => 'tambor grande',
            'peso' => 250,
            'unidad_medida' => 'kg'
        ]);
    }
}
