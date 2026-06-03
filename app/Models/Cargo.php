<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /** @use HasFactory<\Database\Factories\CargoFactory> */
    use HasFactory;
    public function empleados()
    {
        return $this->hasMany(Empleado::class,'id_cargo');
    }
    public function funcionesCargo()
    {
        return $this->hasMany(FuncionesCargo::class,'id_cargo');
    }
}
