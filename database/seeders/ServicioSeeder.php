<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre' => 'Tratamiento de agua'
        ]);
        Servicio::create([
            'nombre' => 'Limpieza de piscina'
        ]);
        Servicio::create([
            'nombre' => 'Purificación de agua'
        ]);
        Servicio::create([
            'nombre' => 'Tratamiento de agua salada'
        ]);
        Servicio::create([
            'nombre' => 'Tratamiento biologico'
        ]);
        Servicio::create([
            'nombre' => 'Desinfeccion y oxidación'
        ]);
        Servicio::create([
            'nombre' => 'Soluciones de electrodeionización'
        ]);
    }
}
