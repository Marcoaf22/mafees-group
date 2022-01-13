<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre' => 'Sin asignar'
        ]);
        Estado::create([
            'nombre' => 'Asignado'
        ]);
        Estado::create([
            'nombre' => 'Mantenimiento'
        ]);
        Estado::create([
            'nombre' => 'Desechado'
        ]);
    }
}
