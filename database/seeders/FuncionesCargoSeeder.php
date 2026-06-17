<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FuncionesCargo;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class FuncionesCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargos=Cargo::all();
        Foreach($cargos as $cargo){
            FuncionesCargo::factory(5)->create([
            'id_cargo' =>$cargo->id,
        ]);
    }
    }
}
