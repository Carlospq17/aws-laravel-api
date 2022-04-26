<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Alumnos;

class AlumnosController extends Controller
{

    public function __construct(){
    }

    public function getAll(Request $request){
        return $request->session()->all();
    }

    public function getAlumno(Request $request, $id){
        return response()->json($request->session()->get($id), 200);
    }

    public function createAlumno(Request $request){
        $alumno = new Alumnos();
        $alumno->Id =  Uuid::uuid1()->toString();;
        $alumno->nombres = $request->input('nombres');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->matricula = $request->input('matricula');
        $alumno->promedio = $request->input('promedio');
        $request->session()->put($alumno->Id,  $alumno);
        return response()->json($alumno, 201);
    }

    public function updateAlumno(Request $request, $id){
        $value = $request->session()->get($id);
        $value->nombres = $request->input('nombres');
        $value->apellidos = $request->input('apellidos');
        $value->matricula = $request->input('matricula');
        $value->promedio = $request->input('promedio');
        return response()->json($value, 200);
    }

    public function deleteAlumno(Request $request, $id){
        return response()->json($request->session()->forget($id), 200);
    }
}
