<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AlmacenSeeder::class,
            ClienteSeeder::class,
            EstadoSeeder::class,
            TanqueSeeder::class,
            ServicioSeeder::class,
            PreparacionSeeder::class,
            OrdenSeeder::class,
            PresentacionSeeder::class,
            ProductoSeeder::class,
        ]);

        User::created(['name' => 'marco', 'email' => 'marco@gmail.com', 'password' => Hash::make('password')]);
    }
}
