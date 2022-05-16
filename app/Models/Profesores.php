<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;

    private int $id;
    private int $numeroEmpleado;
    private string $nombres;
    private string $apellidos;
    private int $horasClase;

    public function __construct(){
    }
}
