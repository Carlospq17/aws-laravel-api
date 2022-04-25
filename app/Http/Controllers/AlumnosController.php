<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;

class AlumnosController extends Controller
{
    //
    public function getAll(){
        return "Get All";
    }

    public function getAlumno($id){
        return "Get Alumno ".$id;
    }

    public function createAlumno(Request $request){
        dd($request);
        return "Create Alumno";
    }

    public function updateAlumno($id, Request $request){
        dd($request);
        return "Update Alumno ".$id;
    }

    public function deleteAlumno($id){
        dd($id);
        return "Delete Alumno ".$id;
    }
}
