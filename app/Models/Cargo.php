<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    /** @use HasFactory<\Database\Factories\CargoFactory> */
    use HasFactory;
    protected $fillable = [
    ];
    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class,'id_cargo');
    }
    public function funcionesCargo(): HasMany
    {
        return $this->hasMany(FuncionesCargo::class,'id_cargo');
    }
}
