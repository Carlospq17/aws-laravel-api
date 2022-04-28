<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Profesores;
use Illuminate\Support\Facades\Validator;

class ProfesoresController extends Controller
{

    public function __construct(){
    }

    public function getAll(Request $request){
        return response()->json($request->session()->all(), 200);
    }

    public function getProfesor(Request $request, $id){
        if (!$request->session()->get("a".$id)){
            return response()->json(['errores' => ['message' => 'No se encontro el id solicitado']], 404);
        }
        return response()->json($request->session()->get("a".$id), 200);
    }

    public function createProfesor(Request $request){
        $validator = Validator::make(
            $request->input(),[
                'id' => 'required|numeric',
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
        $profesor->Id = "a".$request->input('id');
        $profesor->numeroEmpleado = $request->input('numeroEmpleado');
        $profesor->nombres = $request->input('nombres');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->horasClase = $request->input('horasClase');
        $request->session()->put($profesor->Id,  $profesor);
        return response()->json($profesor, 201);
    }

    public function updateProfesor(Request $request, $id){
        $validator = Validator::make(
            $request->input(),[
                'nombres' => 'string',
                'apellidos' => 'string',
                'numeroEmpleado' => 'numeric|gt:0',
                'horasClase' => 'numeric|gt:0',
            ],[
                'strings' => 'El campo :attribute debe ser un string.',
                'numeric' => 'El campo :attribute debe ser numérico.'
            ]);

        if (!$request->session()->get("a".$id)){
            return response()->json(['errores' => ['message' => 'No se encontro el id solicitado']], 404);
        }

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 500);
        }

        $value = $request->session()->get("a".$id);
        $value->numeroEmpleado = $request->input('numeroEmpleado');
        $value->nombres = $request->input('nombres');
        $value->apellidos = $request->input('apellidos');
        $value->horasClase = $request->input('horasClase');
        return response()->json($value, 200);
    }

    public function deleteProfesor(Request $request, $id){
        if (!$request->session()->get("a".$id)){
            return response()->json(['errores' => ['message' => 'No se encontro el id solicitado']], 404);
        }
        return response()->json($request->session()->forget("a".$id), 200);
    }
}
