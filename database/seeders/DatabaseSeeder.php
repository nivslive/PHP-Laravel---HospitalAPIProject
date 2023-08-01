<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CidadeFactory;
use Database\Factories\MedicoFactory;
use Database\Factories\MedicoPacienteFactory;
use Database\Factories\PacienteFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CidadeFactory::class,
            MedicoFactory::class,
            PacienteFactory::class,
            MedicoPacienteFactory::class,
        ]);
    }
}
