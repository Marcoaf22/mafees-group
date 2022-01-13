<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almacen::create([
            'nombre' => 'Almacen Warnes',
            'descripcion' => 'es el almacen donde se guardan los quimicos',
            'direccion' => 'Warnes - Quinto anillo y Beni',
            'telefono' => 63496385,
            'latitud' => -17.507278620110142,
            'longitud' => -63.16436908793301,
            'principal' => true
        ]);
        Almacen::create([
            'nombre' => 'Almacen mantenimiento',
            'descripcion' => 'es el almacen donde hacen mantenimiento a los ibc',
            'direccion' => 'Cotoca - Octavo anillo y G-77',
            'telefono' => 63496386,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'principal' => false
        ]);
        Almacen::create([
            'nombre' => 'Almacen Quimico',
            'descripcion' => 'almacen quimico liquido',
            'direccion' => 'La guardia',
            'latitud' => -17.8971208772702,
            'longitud' => -63.333327477396885,
            'telefono' => 68597463,
            'principal' => false
        ]);
        Almacen::create([
            'nombre' => 'Almacen Quimico',
            'descripcion' => 'almacen quimico solido',
            'direccion' => 'Cambodromo y 7mo anillo',
            'telefono' => 68597463,
            'latitud' => -17.50312975886783,
            'longitud' => -63.16382265336972,
            'principal' => false
        ]);
    }
}
