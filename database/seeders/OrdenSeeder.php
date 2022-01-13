<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orden::create([
            // 'ubicacion' => 'Cuarto anillo San Aurelio',
            'duracion' => 3,
            'preparacion_id' => 1,
            'cliente_id' => 2,
            'latitud' => -17.675046166693555,
            'longitud' => -63.15861684376823,
            'servicio_id' => 1
        ]);
        Orden::create([
            // 'ubicacion' => 'Octavo anillo y G-77',
            'duracion' => 2,
            'preparacion_id' => null,
            'cliente_id' => 2,
            'latitud' => -17.84617816911812,
            'longitud' => -63.24737118950077,
            'servicio_id' => 1


        ]);
        Orden::create([
            // 'ubicacion' => 'Alemana tercer anillo',
            'duracion' => 4,
            // 'preparacion_id' => 3,
            'cliente_id' => 2,
            'latitud' => -17.886597284178627,
            'longitud' =>  -63.14979828529224,
            'servicio_id' => 1

        ]);
        Orden::create([
            // 'ubicacion' => 'Segundo anillo y Bush',
            'duracion' => 5,
            // 'preparacion_id' => 4,
            'cliente_id' => 2,
            'latitud' => -17.809915185332937,
            'longitud' => -63.060839852486886,
            'servicio_id' => 1

        ]);
        Orden::create([
            // 'ubicacion' => 'Tercer anillo y Beni',
            'duracion' => 3,
            'preparacion_id' => 5,
            'cliente_id' => 2,

            'latitud' => -17.871161571733488,
            'longitud' => -63.06371430045218,
            'servicio_id' => 1

        ]);
        Orden::create([
            // 'ubicacion' => 'Warnes c/muchiri esquina 12',
            'duracion' => 3,
            'preparacion_id' => 5,
            'cliente_id' => 2,

            'latitud' =>  -17.7163683832,
            'longitud' => -63.1271414158,
            'servicio_id' => 1

        ]);
    }
}
