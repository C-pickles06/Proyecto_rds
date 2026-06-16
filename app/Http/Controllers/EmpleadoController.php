<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $empleados=Empleado::all();

       return response()->json($empleados,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       $validator = validator::make($request->all(), [
            'id_cargo' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'fecha_ingreso' => 'required',
            'salario' => 'required',
            'estado' => 'required',
       ]);
       if($validator->fails()){
        $data=[
            'message'=>'error en la validacion de los datos',
            'errors'=>$validator->errors(),
            'status'=>'400'
        ];
        return response()->json($data,400);
       }

       $existeEmpleado = Empleado::where('nombres', $request->nombres)
        ->where('apellidos', $request->apellidos)
        ->where('fecha_nacimiento', $request->fecha_nacimiento)
        ->exists();

    if ($existeEmpleado) {
        return response()->json([
            'message' => 'El empleado ya se encuentra registrado',
            'status' => 400
        ], 400);
    }

       $empleado=Empleado::create([
            'id_cargo'=>$request->id_cargo,
            'nombres'=>$request->nombres,
            'apellidos'=>$request->apellidos,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'salario'=>$request->salario,
            'estado'=>$request->estado
        ]);
       if(!$empleado){
        $data=[
        'message'=>'error al crear un empleado',
        'status'=>500
        ];
        return response()->json($data,500);
       }
       $data=[
        'empleado'=>$empleado,
        'status'=>201
       ];
       return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $empleado ->load('cargo.funcionesCargo');
        $detalle=[
            'nombre_empleado'=>$empleado->$empleado . $empleado->apellidos,
            'cargo_asignado'=>$empleado->cargo ? $empleado->cargo->nombre_cargo : 'Sin cargo',
            'salario' => $empleado->salario,
            'funciones' => $empleado->cargo->funcionesCargo ? $empleado->cargo->funcionesCargo : [],
            
        ];
        return response()->json($detalle,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
          $validator=validator::make($request->all(),[
        'id_cargo'=>'required',
        'nombres'=>'required',
        'apellidos'=>'required',
        'fecha_nacimiento'=>'required',
        'fecha_ingreso'=>'required',
        'salario'=>'required',
        'estado'=>'required'

       ]);
       if($validator->fails()){
        $data=[
            'message'=>'error en la validacion de los datos',
            'errors'=>$validator->errors(),
            'estatus'=>'400'
        ];
        return response()->json($data,400);
       }
       $empleado->update([
        'id_cargo'=>$request->id_cargo,
        'nombres'=>$request->nombres,
        'apellidos'=>$request->apellidos,
        'fecha_nacimiento'=>$request->fecha_nacimiento,
        'fecha_ingreso'=>$request->fecha_ingreso,
        'salario'=>$request->salario,
        'estado'=>$request->estado
       ]);
       if(!$empleado){
        $data=[
        'message'=>'erro al crear un empleado',
        'status'=>500
        ];
        return response()->json($data,500);
       }
       $data=[
        'empleado'=>$empleado,
        'status'=>201
       ];
       return response()->json($data,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->json(['message'=>'eliminado con exito',200]);
    }
}