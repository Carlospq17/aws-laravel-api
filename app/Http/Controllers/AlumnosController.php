<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Validator;

class AlumnosController extends Controller
{

    public function __construct(){
    }

    public function getAll(Request $request){
        return response()->json($request->session()->all(), 200);
    }

    public function getAlumno(Request $request, $id){
        if (!$request->session()->get("a".$id)){
            return response()->json(['errores' => ['message' => 'No se encontro el id solicitado']], 404);
        }
        return response()->json($request->session()->get("a".$id), 200);
    }

    public function createAlumno(Request $request){
        $validator = Validator::make(
            $request->input(),[
                'id' => 'required|numeric',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'matricula' => 'required|numeric|gt:0',
                'promedio' => 'required|numeric|gt:0',
            ],[
                'strings' => 'El campo :attribute debe ser un string.',
                'required' => 'El campo :attribute es requerido.',
                'numeric' => 'El campo :attribute debe ser numérico.'
            ]);

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 400);
        }

        $alumno = new Alumnos();
        $alumno->Id =  "a".$request->input('id');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->matricula = $request->input('matricula');
        $alumno->promedio = $request->input('promedio');
        $request->session()->put($alumno->Id,  $alumno);
        return response()->json($alumno, 201);
    }

    public function updateAlumno(Request $request, $id){
        $validator = Validator::make(
            $request->input(),[
                'nombres' => 'string',
                'apellidos' => 'string',
                'matricula' => 'numeric|gt:0',
                'promedio' => 'numeric|gt:0',
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
        $value->nombres = $request->input('nombres');
        $value->apellidos = $request->input('apellidos');
        $value->matricula = $request->input('matricula');
        $value->promedio = $request->input('promedio');

        return response()->json($value, 200);
    }

    public function deleteAlumno(Request $request, $id){
        if (!$request->session()->get("a".$id)){
            return response()->json(['errores' => ['message' => 'No se encontro el id solicitado']], 404);
        }
        return response()->json($request->session()->forget("a".$id), 200);
    }
}
