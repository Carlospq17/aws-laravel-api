<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;

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

Route::put('/alumnos/{id}', [AlumnosController::class, 'updateAlumno']);

Route::delete('/alumnos/{id}', [AlumnosController::class, 'deleteAlumno']);
