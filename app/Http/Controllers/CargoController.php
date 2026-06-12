<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargo = Cargo::all();
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
        //
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
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return response()->json(['message'=>'eliminado con exito',200]);
    }
}
