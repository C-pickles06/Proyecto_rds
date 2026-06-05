<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    protected $fillable = [
            'nombres',
            'apellidos',
            'fecha_nacimiento',
            'fecha_ingreso',
            'salario',
            'id_cargo',
        ];

    public function updateEmpleado($request, $empleado)
    {
        $empleado->update([
         'id_cargo'=>$request->id_cargo,
         'nombres'=>$request->nombres,
         'apellidos'=>$request->apellidos,
         'fecha_nacimiento'=>$request->fecha_nacimiento,
         'fecha_ingreso'=>$request->fecha_ingreso,
         'salario'=>$request->salario,
         'estado'=>$request->estado
        ]);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
