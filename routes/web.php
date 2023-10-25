<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\Auth\RegisteredUserController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/division', 'carreras')->name('division');
Route::view('/interatic', 'interatic')->name('interatic');

Route::middleware('auth')->group(function () {
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
    Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
    Route::post('/proyectos/store', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::get('/proyectos/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');
    Route::get('/proyectos/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
    Route::patch('/proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::delete('/proyectos/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/periodos', [PeriodoController::class, 'index'])->name('periodos.index');
    Route::get('/periodos/create', [PeriodoController::class, 'create'])->name('periodos.create');
    Route::post('/periodos/store', [PeriodoController::class, 'store'])->name('periodos.store');
    Route::get('/periodos/{periodo}/edit', [PeriodoController::class, 'edit'])->name('periodos.edit');
    Route::patch('/periodos/{periodo}', [PeriodoController::class, 'update'])->name('periodos.update');
    Route::delete('/periodos/{periodo}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/divisiones', [DivisionController::class, 'index'])->name('divisiones.index');
    Route::get('/divisiones/create', [DivisionController::class, 'create'])->name('divisiones.create');
    Route::post('/divisiones/store', [DivisionController::class, 'store'])->name('divisiones.store');
    Route::get('/divisiones/{division}/edit', [DivisionController::class, 'edit'])->name('divisiones.edit');
    Route::patch('/divisiones/{division}', [DivisionController::class, 'update'])->name('divisiones.update');
    Route::get('/divisiones/{division}', [DivisionController::class, 'activar'])->name('divisiones.activar');
    Route::delete('/divisiones/{division}', [DivisionController::class, 'destroy'])->name('divisiones.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
    Route::get('/carreras/create', [CarreraController::class, 'create'])->name('carreras.create');
    Route::post('/carreras/store', [CarreraController::class, 'store'])->name('carreras.store');
    Route::get('/carreras/{carrera}/edit', [CarreraController::class, 'edit'])->name('carreras.edit');
    Route::patch('/carreras/{carrera}', [CarreraController::class, 'update'])->name('carreras.update');
    Route::get('/carreras/{carrera}', [CarreraController::class, 'activar'])->name('carreras.activar');
    Route::delete('/carreras/{carrera}', [CarreraController::class, 'destroy'])->name('carreras.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/materias', [MateriaController::class, 'index'])->name('materias.index');
    Route::get('/materias/create', [MateriaController::class, 'create'])->name('materias.create');
    Route::post('/materias/store', [MateriaController::class, 'store'])->name('materias.store');
    Route::get('/materias/{materia}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
    Route::patch('/materias/{materia}', [MateriaController::class, 'update'])->name('materias.update');
    Route::get('/materias/{materia}', [MateriaController::class, 'activar'])->name('materias.activar');
    Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/auth', [RegisteredUserController::class, 'index'])->name('usuarios.index');
    Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('usuarios.registro');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
