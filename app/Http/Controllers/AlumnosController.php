<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    //
    public function getAll(){
        return "Get All";
    }

    public function getAlumno($id){
        return "Get Alumno ".$id;
    }

    public function createAlumno(){
        return redirect()->back();
    }

    public function updateAlumno($id){
        return "Update Alumno ".$id;
    }

    public function deleteAlumno($id){
        return "Delete Alumno ".$id;
    }
}
