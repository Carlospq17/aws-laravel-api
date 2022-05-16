<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Validator;

class AlumnosController extends Controller
{

    public function __construct(){
    }

    public function getAll(){
        return response()->json(Alumnos::all(), 200);
    }

    public function getAlumno($id){
        $alumno = Alumnos::findOrFail($id);
        return response()->json($alumno, 200);
    }

    public function createAlumno(Request $request){
        $validator = Validator::make(
            $request->input(),[
                'id' => 'required|numeric|unique:App\Models\Alumnos,id',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'matricula' => 'required|numeric|gt:0',
                'promedio' => 'required|numeric|gt:0',
            ],[
                'strings' => 'El campo :attribute debe ser un string.',
                'numeric' => 'El campo :attribute debe ser numérico.',
                'required' => 'El campo :attribute es requerido.'
            ]);

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 400);
        }

        $alumno = new Alumnos();
        $alumno->id = $request->input('id');
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->matricula = $request->input('matricula');
        $alumno->promedio = $request->input('promedio');

        $alumno->save();
        return response()->json($alumno, 201);
    }

    public function updateAlumno(Request $request, $id){
        $validator = Validator::make(
            [
                'id' => $id,
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'matricula' => $request->input('matricula'),
                'promedio' => $request->input('promedio'),
            ]
            ,[
                'id' => 'exists:App\Models\Alumnos,id',
                'nombres' => 'string',
                'apellidos' => 'string',
                'matricula' => 'numeric|gt:0',
                'promedio' => 'numeric|gt:0',
            ],[
                'exists' => 'El :attribute no existe.',
                'strings' => 'El campo :attribute debe ser un string.',
                'numeric' => 'El campo :attribute debe ser numérico.'
            ]);

        if (sizeof($validator->errors()->messages()) > 0) {
            return response()->json(['errores' => $validator->errors()->messages()], 400);
        }

        $alumno = Alumnos::findOrFail($id);
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->matricula = $request->input('matricula');
        $alumno->promedio = $request->input('promedio');

        $alumno->save();

        return response()->json($alumno, 200);
    }

    public function deleteAlumno($id){
        $alumno = Alumnos::findOrFail($id);
        $alumno->delete();
        return response()->json(['message' => 'El elemento se ha eliminado con exito'], 200);
    }
}
