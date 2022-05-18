<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesores;
use Illuminate\Support\Facades\Validator;

class ProfesoresController extends Controller
{

    public function __construct(){
    }

    public function getAll(Request $request){
        return response()->json(Profesores::all(), 200);
    }

    public function getProfesor(Request $request, $id){
        $profesor = Profesores::findOrFail($id);
        return response()->json($profesor, 200);
    }

    public function createProfesor(Request $request){
        $validator = Validator::make(
            $request->input(),[
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'numeroEmpleado' => 'required|numeric|gt:0',
                'horasClase' => 'required|numeric|gt:0',
            ],[
                'strings' => 'El campo :attribute debe ser un string.',
                'required' => 'El campo :attribute es requerido.',
                'numeric' => 'El campo :attribute debe ser numérico.'
            ]);

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 400);
        }
        $profesor = new Profesores();
        $profesor->numeroEmpleado = $request->input('numeroEmpleado');
        $profesor->nombres = $request->input('nombres');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->horasClase = $request->input('horasClase');

        $profesor->save();
        return response()->json($profesor, 201);
    }

    public function updateProfesor(Request $request, $id){
        $validator = Validator::make(
            [
                'id' => $id,
                'numeroEmpleado' => $request->input('numeroEmpleado'),
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'horasClase' => $request->input('horasClase'),
            ],[
                'id' => 'exists:App\Models\Profesores,id',
                'numeroEmpleado' => 'numeric|gt:0',
                'nombres' => 'string',
                'apellidos' => 'string',
                'horasClase' => 'numeric|gt:0',
            ],[
                'strings' => 'El campo :attribute debe ser un string.',
                'numeric' => 'El campo :attribute debe ser numérico.'
            ]);

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 400);
        }

        $profesor = Profesores::findOrFail($id);
        $profesor->numeroEmpleado = $request->input('numeroEmpleado');
        $profesor->nombres = $request->input('nombres');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->horasClase = $request->input('horasClase');

        $profesor->save();
        return response()->json($profesor, 200);
    }

    public function deleteProfesor($id){
        $profesor = Profesores::findOrFail($id);
        $profesor->delete();
        return response()->json(['message' => 'El elemento se ha eliminado con exito'], 200);
    }
}
