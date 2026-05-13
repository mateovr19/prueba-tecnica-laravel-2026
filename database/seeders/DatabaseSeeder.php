<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Propietario;
use App\Models\Veterinario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Propietario::factory(10)
            ->hasMascotas(fake()->numberBetween(2, 4))
            ->create();

        Veterinario::factory(5)->create();

        $mascotasIds = Mascota::pluck('id');
        $veterinariosIds = Veterinario::pluck('id');

        Consulta::factory(20)
            ->sequence(fn() => [
                'mascota_id' => $mascotasIds->random(),
                'veterinario_id' => $veterinariosIds->random(),
            ])
            ->hasTratamientos(fake()->numberBetween(1, 4))
            ->create();
    }
}
