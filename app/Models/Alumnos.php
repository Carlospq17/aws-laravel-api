<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    private int $id;
    private string $nombres;
    private string $apellidos;
    private string $matricula;
    private float $promedio;

    public function __construct(){
    }

}
