<?php

namespace Database\Seeders;

use App\Models\Tanque;
use Illuminate\Database\Seeder;

class TanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,

            'latitud' => -17.507278620110142,
            'longitud' => -63.16436908793301,
            'numero_uso' => 2,
            'estado_id' => 1,
            'almacen_id' => 1
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,

            'latitud' => -17.507278620110142,
            'longitud' => -63.16436908793301,
            'numero_uso' => 3,
            'estado_id' => 2,
            'almacen_id' => 1
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.507278620110142,
            'longitud' => -63.16436908793301,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 1
        ]);

        //COTOCA
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 58,
            'capacidad' => 500,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 2
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 58,
            'capacidad' => 500,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 2
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 58,
            'capacidad' => 500,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 2
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 2
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.8000968640125,
            'longitud' => -62.92066139070278,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 2
        ]);

        //la guardia
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.8971208772702,
            'longitud' => -63.333327477396885,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 3
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.8971208772702,
            'longitud' => -63.333327477396885,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 3
        ]);
        Tanque::create([
            'largo' => 120,
            'ancho' => 100,
            'alto' => 116,
            'capacidad' => 1000,
            'latitud' => -17.8971208772702,
            'longitud' => -63.333327477396885,
            'numero_uso' => 0,
            'estado_id' => 1,
            'almacen_id' => 3
        ]);
    }
}
