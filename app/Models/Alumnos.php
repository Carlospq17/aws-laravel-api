<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    private int $id;
    private string $nombres;
    private string $apellidos;
    private string $matricula;
    private float $promedio;

    public function __construct(int $id,
        string $nombres,
        string $apellidos,
        string $matricula,
        float $promedio){
            $this->id = $id;
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->matricula = $matricula;
            $this->promedio = $promedio;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombres
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set the value of nombres
     *
     * @return  self
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of matricula
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of promedio
     */
    public function getPromedio()
    {
        return $this->promedio;
    }

    /**
     * Set the value of promedio
     *
     * @return  self
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;

        return $this;
    }
}
