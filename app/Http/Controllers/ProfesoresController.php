<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Profesores;

class ProfesoresController extends Controller
{

    public function __construct(){
    }

    public function getAll(Request $request){
        return $request->session()->all();
    }

    public function getProfesor(Request $request, $id){
        return response()->json($request->session()->get($id), 200);
    }

    public function createProfesor(Request $request){
        $profesor = new Profesores();
        $profesor->Id =  Uuid::uuid1()->toString();;
        $profesor->numeroEmpleado = $request->input('numeroEmpleado');
        $profesor->nombres = $request->input('nombres');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->horasClase = $request->input('horasClase');
        $request->session()->put($profesor->Id,  $profesor);
        return response()->json($profesor, 201);
    }

    public function updateProfesor(Request $request, $id){
        $value = $request->session()->get($id);
        $value->numeroEmpleado = $request->input('numeroEmpleado');
        $value->nombres = $request->input('nombres');
        $value->apellidos = $request->input('apellidos');
        $value->horasClase = $request->input('horasClase');
        return response()->json($value, 200);
    }

    public function deleteProfesor(Request $request, $id){
        return response()->json($request->session()->forget($id), 200);
    }
}
