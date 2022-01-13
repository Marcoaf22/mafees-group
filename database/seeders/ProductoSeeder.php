<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Ácido Clorhídrico',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'Es una disolución acuosa del gas cloruro de hidrógeno.',
            'codigo' => 2456,
            'numero_unidades' => 60,
            'precio' => 150,
            'estado' => true,
            'almacen_id' => 1,
            'presentacion_id' => 1,
            'lote_id' => 1
        ]);

        Producto::create([
            'nombre' => 'Ácido Sulfúrico',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'es un compuesto químico extremadamente corrosivo.',
            'codigo' => 1245,
            'numero_unidades' => 100,
            'precio' => 200,
            'estado' => true,
            'almacen_id' => 1,
            'presentacion_id' => 1,
            'lote_id' => 1
        ]);

        Producto::create([
            'nombre' => 'Bicarbonato de Sodio',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'Es un compuesto sólido cristalino de color blanco soluble en agua.',
            'codigo' => 5896,
            'numero_unidades' => 90,
            'precio' => 120,
            'estado' => true,
            'almacen_id' => 1,
            'presentacion_id' => 2,
            'lote_id' => 2
        ]);

        Producto::create([
            'nombre' => 'Hidróxido de Amonio',
            'presentacion' => 'Tambor 100kg',
            'descripcion' => 'Es conocido como agua de amoníaco o amoníaco líquido es una solución de amoníaco en agua.',
            'codigo' => 3256,
            'numero_unidades' => 85,
            'precio' => 110,
            'estado' => true,
            'almacen_id' => 1,
            'presentacion_id' => 1,
            'lote_id' => 2
        ]);

        Producto::create([
            'nombre' => 'Hidróxido de Sodio',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'Es un hidróxido cáustico usado en la industria en la fabricación de papel, tejidos y detergentes.',
            'codigo' => 4589,
            'numero_unidades' => 96,
            'precio' => 115,
            'estado' => true,
            'almacen_id' => 2,
            'presentacion_id' => 3,
            'lote_id' => 2
        ]);

        Producto::create([
            'nombre' => 'Hipoclorito de Sodio',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'Es un compuesto químico, fuertemente oxidante.',
            'codigo' => 6859,
            'numero_unidades' => 50,
            'precio' => 90,
            'estado' => true,
            'almacen_id' => 2,
            'presentacion_id' => 3,
            'lote_id' => 2
        ]);

        Producto::create([
            'nombre' => 'Permanganato de Potasio',
            'presentacion' => 'Tambor 100kg',

            'descripcion' => 'Es un compuesto químico formado por iones de potasio y permanganato.',
            'codigo' => 3547,
            'numero_unidades' => 69,
            'precio' => 112,
            'estado' => true,
            'almacen_id' => 2,
            'presentacion_id' => 3,
            'lote_id' => 3
        ]);
    }
}
