<?php

namespace Database\Seeders;

use App\Models\DetallePreparacion;
use App\Models\Preparacion;
use Illuminate\Database\Seeder;

class PreparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*otra preparacion  1*/
        Preparacion::create([
            'cantidad' => 2,
            'fecha' => '2022-01-15',
            'estado' => true,
            'tanque_id' => 1
        ]);

        // DetallePreparacion::create([
        //     'preparacion_id' => 1,
        //     'producto_id' => 1
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 1,
        //     'producto_id' => 1
        // ]);

        /*otra preparacion  2*/
        Preparacion::create([
            'cantidad' => 3,
            'fecha' => '2022-01-16',
            'estado' => true,
            'tanque_id' => 1
        ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 2,
        //     'producto_id' => 1
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 2,
        //     'producto_id' => 1
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 2,
        //     'producto_id' => 1
        // ]);


        /*otra preparacion  3*/
        Preparacion::create([
            'cantidad' => 2,
            'fecha' => '2022-01-17',
            'estado' => true,
            'tanque_id' => 2
        ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 3,
        //     'producto_id' => 3
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 3,
        //     'producto_id' => 3
        // ]);



        /*otra preparacion 4*/
        Preparacion::create([
            'cantidad' => 2,
            'fecha' => '2022-01-18',
            'estado' => true,
            'tanque_id' => 2
        ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 4,
        //     'producto_id' => 4
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 4,
        //     'producto_id' => 4
        // ]);


        /*otra preparacion 5*/
        Preparacion::create([
            'cantidad' => 2,
            'fecha' => '2022-01-19',
            'estado' => true,
            'tanque_id' => 2
        ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 5,
        //     'producto_id' => 4
        // ]);
        // DetallePreparacion::create([
        //     'preparacion_id' => 5,
        //     'producto_id' => 4
        // ]);
    }
}
