<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Empleado;

class StoreEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'id_cargo'=>'required',
        'nombres'=>'required',
        'apellidos'=>'required',
        'fecha_nacimiento'=>'required',
        'fecha_ingreso'=>'required',
        'salario'=>'required',
        'estado'=>'required'
        ];
    }
    public function store(StoreEmpleadoRequest $request){
        $empleado = Empleado::create($request->validated());
        return response()->json($empleado, 201);
    }
    
        
}
