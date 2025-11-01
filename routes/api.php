<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::post('registrar', [AuthController::class, 'registrar']);
Route::post('login', [AuthController::class, 'login']);

// Rutas comunes a cualquier usuario autenticado
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

        // Gestión de usuarios
    Route::get('listarUsuarios', [UsuariosController::class, 'index']);
    Route::post('crearUsuarios', [UsuariosController::class, 'store']);
    Route::get('usuarios/{id}', [UsuariosController::class, 'show']);
    Route::put('actualizarUsuarios/{id}', [UsuariosController::class, 'update']);
    Route::delete('eliminarUsuarios/{id}', [UsuariosController::class, 'destroy']);

    // Gestión de pacientes
    Route::get('listarPacientes', [PacientesController::class, 'index']);
    Route::post('crearPacientes', [PacientesController::class, 'store']);
    Route::get('pacientes/{id}', [PacientesController::class, 'show']);
    Route::put('actualizarPacientes/{id}', [PacientesController::class, 'update']);
    Route::delete('eliminarPacientes/{id}', [PacientesController::class, 'destroy']);

    // Gestión de especialidades
    Route::get('listarEspecialidades', [EspecialidadesController::class, 'index']);
    Route::post('crearEspecialidades', [EspecialidadesController::class, 'store']);
    Route::get('especialidades/{id}', [EspecialidadesController::class, 'show']);
    Route::put('actualizarEspecialidades/{id}', [EspecialidadesController::class, 'update']);
    Route::delete('eliminarEspecialidades/{id}', [EspecialidadesController::class, 'destroy']);

    // Gestión de doctores
    Route::get('listarDoctores', [DoctoresController::class, 'index']);
    Route::post('crearDoctores', [DoctoresController::class, 'store']);
    Route::get('doctores/{id}', [DoctoresController::class, 'show']);
    Route::put('actualizarDoctores/{id}', [DoctoresController::class, 'update']);
    Route::delete('eliminarDoctores/{id}', [DoctoresController::class, 'destroy']);

    // Consultorios
    Route::get('listarConsultorios', [ConsultoriosController::class, 'index']);
    Route::post('crearConsultorios', [ConsultoriosController::class, 'store']);
    Route::get('consultorios/{id}', [ConsultoriosController::class, 'show']);
    Route::put('actualizarConsultorios/{id}', [ConsultoriosController::class, 'update']);
    Route::delete('eliminarConsultorios/{id}', [ConsultoriosController::class, 'destroy']);

    // Horarios
    Route::get('listarHorarios', [HorariosController::class, 'index']);
    Route::post('crearHorarios', [HorariosController::class, 'store']);
    Route::get('horarios/{id}', [HorariosController::class, 'show']);
    Route::put('actualizarHorarios/{id}', [HorariosController::class, 'update']);
    Route::delete('eliminarHorarios/{id}', [HorariosController::class, 'destroy']);

    // Citas
    Route::get('listarCitas', [CitasController::class, 'index']);
    Route::post('crearCitas', [CitasController::class, 'store']);
    Route::get('citas/{id}', [CitasController::class, 'show']);
    Route::put('actualizarCitas/{id}', [CitasController::class, 'update']);
    Route::delete('eliminarCitas/{id}', [CitasController::class, 'destroy']);

    // Historial
    Route::get('listarHistorial', [HistorialController::class, 'index']);
    Route::post('crearHistorial', [HistorialController::class, 'store']);
    Route::get('historial/{id}', [HistorialController::class, 'show']);
    Route::put('actualizarHistorial/{id}', [HistorialController::class, 'update']);
    Route::delete('eliminarHistorial/{id}', [HistorialController::class, 'destroy']);
});



