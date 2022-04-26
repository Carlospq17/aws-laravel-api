<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    private string $Id;
    private string $nombres;
    private string $apellidos;
    private string $matricula;
    private float $promedio;

    public function __construct(){
    }

}
