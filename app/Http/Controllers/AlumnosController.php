<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;

class AlumnosController extends Controller
{
    //
    protected Alumnos $alumnos;

    public function __construct(Alumnos $alumnos){
        $this->alumnos = $alumnos;
    }

    public function getAll(){
        return "Get All";
    }

    public function getAlumno($id){
        return "Get Alumno ".$id;
    }

    public function createAlumno(){
        return "Create Alumno";
    }

    public function updateAlumno($id){
        return "Update Alumno ".$id;
    }

    public function deleteAlumno($id){
        return "Delete Alumno ".$id;
    }
}
