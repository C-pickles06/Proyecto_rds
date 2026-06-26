<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FuncionesCargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargo = Cargo::with('funcionesCargo')->paginate(10);
        return response()->json($cargo,200);
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
        $existeCargo = Cargo::where('nombre_cargo', $request->nombre_cargo)->exists();
        if ($existeCargo) {
            return response()->json([
                'message' => 'El cargo ya se encuentra registrado',
                'status' => 400
            ], 400);
        }
        $validator = validator::make($request->all(),[
            'nombre_cargo'=>'required',
            'descripcion'=>'required',
        ]);
        if($validator->fails()){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'errors'=>$validator->errors(),
                'estatus'=>'400'
            ];
            return response()->json($data,400);
        }
        $cargo = Cargo::create([
            'nombre_cargo'=>$request->nombre_cargo,
            'descripcion'=>$request->descripcion,
        ]);
        if(!$cargo){
            $data=[
                'message'=>'error al crear un cargo',
                'status'=>500
            ];
            return response()->json($data,500);
        }
        $data=[
            'cargo'=>$cargo,
            'status'=>201
        ];
        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        $detalleCargo=[
            'nombre'=>$cargo->nombre_cargo,
            'descripcion'=>$cargo->descripcion,
            'funciones'=>$cargo->funcionesCargo,
        ];
        return response()->json($detalleCargo,200);
    }


    public function funciones(Cargo $cargo)
    {
        return response()->json([
            'cargo' => $cargo->nombre_cargo,
            'funciones'=> $cargo->funcionesCargo
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargo $cargo)
    {
        $validator=validator::make($request->all(),[
            'nombre_cargo'=>'required',
            'descripcion'=>'required',
        ]);
        if($validator->fails()){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'errors'=>$validator->errors(),
                'estatus'=>'400'
            ];
            return response()->json($data,400);
        }
        $cargo->update([
            'nombre_cargo'=>$request->nombre_cargo,
            'descripcion'=>$request->descripcion,
        ]);
        if(!$cargo){
            $data=[
                'message'=>'error al actualizar un cargo',
                'status'=>500
            ];
            return response()->json($data,500);
        }
        $data=[
            'cargo'=>$cargo,
            'status'=>200
        ];
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $cargo = Cargo::find($id);
        if(!$cargo){
            return response()->json(['message'=>'Cargo no encontrado'],400);
        }
        $cargo->delete();
        return response()->json(['message'=>'eliminado con exito',200]);
=======
        if(!isset($cargo)){
            return response()->json(['message'=>'cargo no encontrado',404]);
        }else{
            $cargo->delete();
            return response()->json(['message'=>'eliminado con exito',200]);
        }
>>>>>>> 291abcf5e16ea6742915a24d2ddd68e7685eef3f
    }
}
