<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Database\Factories\CidadeFactory;
// use Database\Factories\MedicoFactory;
// use Database\Factories\MedicoPacienteFactory;
// use Database\Factories\PacienteFactory;
use Database\Seeders\{PacienteSeeder, MedicoPacienteSeeder, MedicoSeeder, CidadeSeeder};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CidadeSeeder::class,
            PacienteSeeder::class,
            MedicoSeeder::class,
            MedicoPacienteSeeder::class,
        ]);
    }
}
