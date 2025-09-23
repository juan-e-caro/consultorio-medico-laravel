<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitasController
{
    public function index()
    {
        $citas = Citas::all();
        return response()->json($citas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'idPaciente' => 'required',
            'idDoctor' => 'required',
            'idHorario' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $citas = Citas::create($validator->validated());
        return response()->json($citas,201);
    }

    public function show(string $id)
    {
        $citas = Citas::find($id);

        if(!$citas){
            return response()->json(['message' => 'cita no encontrada'],404);
        }
        return response()->json($citas);
    }

    public function update(Request $request, string $id)
    {
        $citas = Citas::find($id);

        if(!$citas){
            return response()->json(['message' => 'cita no encontrada'],404);
        }

        $validator = Validator::make($request->all(),[
            'idPaciente' => 'string',
            'idDoctor' => 'string',
            'idHorario' => 'string',
            'fecha' => 'date',
            'estado' => 'string'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $citas->update($validator->validated());
        return response()->json($citas);
    }

    public function destroy(string $id)
    {
        $citas = Citas::find($id);

        if(!$citas){
            return response()->json(['message' => 'cita no encontrada'],404);
        }
        return response()->json(['message' => 'cita eliminada con exito']);
    }
}
