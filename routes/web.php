<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\ProfesoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alumnos', [AlumnosController::class, 'getAll']);

Route::get('/alumnos/{id}', [AlumnosController::class, 'getAlumno']);

Route::post('/alumnos', [AlumnosController::class, 'createAlumno']);

Route::post('/alumnos/{id}/fotoPerfil', [AlumnosController::class, 'saveProfileImage']);

Route::put('/alumnos/{id}', [AlumnosController::class, 'updateAlumno']);

Route::delete('/alumnos/{id}', [AlumnosController::class, 'deleteAlumno']);

Route::get('/profesores', [ProfesoresController::class, 'getAll']);

Route::get('/profesores/{id}', [ProfesoresController::class, 'getProfesor']);

Route::post('/profesores', [ProfesoresController::class, 'createProfesor']);

Route::put('/profesores/{id}', [ProfesoresController::class, 'updateProfesor']);

Route::delete('/profesores/{id}', [ProfesoresController::class, 'deleteProfesor']);
