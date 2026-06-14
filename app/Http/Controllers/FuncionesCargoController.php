<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\FuncionesCargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FuncionesCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionesCargo = FuncionesCargo::all();

        return response()->json($funcionesCargo,200);
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
            'descripcion_funcion'=>'required',
            'estado'=>'required',
        ]);
        if($validator->fails()){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'errors'=>$validator->errors(),
                'status'=>'400'
            ];
            return response()->json($data,400);
        }
        $funcionesCargo=FuncionesCargo::create([
            'descripcion_funcion'=>$request->descripcion_funcion,
            'estado'=>$request->estado,
        ]);
        if(!$funcionesCargo){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'estatus'=>500
            ];
            return response()->json($data,500);
        }
        $data=[
            'cargo' =>$funcionesCargo,
            'status'=>201
        ];
        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FuncionesCargo $funcionesCargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuncionesCargo $funcionesCargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuncionesCargo $funcionesCargo)
    {
        $validator = validator::make($request->all(),[
            'descripcion_funcion'=>'required',
            'estado'=>'required',
        ]);
        if($validator->fails()){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'errors'=>$validator->errors(),
                'status'=>'400'
            ];
            return response()->json($data,400);
        }
        $funcionesCargo->update([
            'descripcion_funcion'=>$request->descripcion_funcion,
            'estado'=>$request->estado,
        ]);
        if(!$funcionesCargo){
            $data=[
                'message'=> 'error en la validacion de los datos',
                'estatus'=>500
            ];
            return response()->json($data,500);
        }
        $data=[
            'cargo' =>$funcionesCargo,
            'status'=>200
        ];
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuncionesCargo $funcionesCargo)
    {
        $funcionesCargo->delete();
        return response()->json(['message'=>'eliminado con exito'],200);
    }
}
