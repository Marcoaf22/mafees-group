<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'Jorge lopoz flores',
            'tipo' => 'Personal',
        ]);
        Cliente::create([
            'nombre' => 'Saguapac',
            'tipo' => 'Empresa',
        ]);
        Cliente::create([
            'nombre' => 'EMBOL S.A.',
            'tipo' => 'Empresa',
        ]);
        Cliente::create([
            'nombre' => 'Luis fernandez vera',
            'tipo' => 'Personal',
        ]);
        Cliente::create([
            'nombre' => 'CBN S.A',
            'tipo' => 'Empresa',
        ]);
        Cliente::create([
            'nombre' => 'BEBIDAS S.A.',
            'tipo' => 'Empresa',
        ]);
        Cliente::create([
            'nombre' => 'FABOCE S.R.L.',
            'tipo' => 'Empresa',
        ]);
    }
}
