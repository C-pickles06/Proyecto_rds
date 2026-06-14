<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FuncionesCargo;
use Illuminate\Database\Seeder;

class FuncionesCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuncionesCargo::factory(5)->create();
    }
}
