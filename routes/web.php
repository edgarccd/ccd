<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\EjeController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/conocenos', 'conocenos')->name('conocenos');
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
    Route::get('/materias/show', [MateriaController::class, 'show'])->name('materias.show');
    Route::get('/materias/create', [MateriaController::class, 'create'])->name('materias.create');
    Route::post('/materias/store', [MateriaController::class, 'store'])->name('materias.store');
    Route::get('/materias/{materia}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
    Route::patch('/materias/{materia}', [MateriaController::class, 'update'])->name('materias.update');
    Route::get('/materias/{materia}', [MateriaController::class, 'activar'])->name('materias.activar');
    Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/indicadores', [IndicadorController::class, 'index'])->name('indicadores.index');
    Route::get('/indicadores/create', [IndicadorController::class, 'create'])->name('indicadores.create');
    Route::post('/indicadores/store', [IndicadorController::class, 'store'])->name('indicadores.store');
    Route::get('/indicadores/{indicador}/edit', [IndicadorController::class, 'edit'])->name('indicadores.edit');
    Route::patch('/indicadores/{indicador}', [IndicadorController::class, 'update'])->name('indicadores.update');
    Route::delete('/indicadores/{indicador}', [IndicadorController::class, 'destroy'])->name('indicadores.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/aulas', [AulaController::class, 'index'])->name('aulas.index');
    Route::get('/aulas/create', [AulaController::class, 'create'])->name('aulas.create');
    Route::post('/aulas/store', [AulaController::class, 'store'])->name('aulas.store');
    Route::get('/aulas/{aula}/edit', [AulaController::class, 'edit'])->name('aulas.edit');
    Route::patch('/aulas/{aula}', [AulaController::class, 'update'])->name('aulas.update');
    Route::delete('/aulas/{aula}', [AulaController::class, 'destroy'])->name('aulas.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/ejes/{usuario}', [EjeController::class, 'index'])->name('ejes.index');
    Route::get('/ejes/create/{usuario}', [EjeController::class, 'create'])->name('ejes.create');
    Route::post('/ejes/store/{usuario}/{carrera}/{turno}', [EjeController::class, 'store'])->name('ejes.store');    
});

Route::middleware('auth')->group(function () {
    Route::get('/equipos/{usuario}', [EquipoController::class, 'index'])->name('equipos.index');  
    Route::get('/equipos/create/{grupo}', [EquipoController::class, 'create'])->name('equipos.create'); 
    Route::post('/equipos/store/{grupo}', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/show/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::delete('/equipos/{alumno}/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
    Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');
    Route::post('/grupos/store', [GrupoController::class, 'store'])->name('grupos.store');
    Route::get('/grupos/maestroStore/{grupo}', [GrupoController::class, 'maestroStore'])->name('grupos.maestroStore');
    Route::get('/grupos/tutorStore/{carrera},{id}', [GrupoController::class, 'tutorStore'])->name('grupos.tutorStore');
    Route::get('/grupos/{grupo}/edit', [GrupoController::class, 'edit'])->name('grupos.edit');
    Route::patch('/grupos/{grupo}', [GrupoController::class, 'update'])->name('grupos.update');
    Route::delete('/grupos/{grupo}', [GrupoController::class, 'destroy'])->name('grupos.destroy');
    Route::get('/grupos/{grupo}', [GrupoController::class, 'showMaterias'])->name('grupos.showMaterias');
    Route::get('/grupos/showGrupos/{id},{turno}', [GrupoController::class, 'showGrupos'])->name('grupos.showGrupos');
});

Route::middleware('auth')->group(function () {
    Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula.index');
    Route::get('/matricula/showGrupos/{id}', [MatriculaController::class, 'showGrupos'])->name('matricula.showGrupos');
    Route::get('/matricula/{carrera}', [MatriculaController::class, 'create'])->name('matricula.create');
    Route::post('/matricula/{carrera}', [MatriculaController::class, 'store'])->name('matricula.store');
    Route::get('/matricula/alumnos/{grupo}', [MatriculaController::class, 'showAlumnos'])->name('matricula.showAlumnos');
    Route::get('/matricula/search/{grupo}', [MatriculaController::class, 'search'])->name('matricula.search');
    Route::get('/matricula/reinscribir/{id}', [MatriculaController::class, 'reinscribir'])->name('matricula.reinscribir');
    Route::get('/matricula/reinstore/{periodo}', [MatriculaController::class, 'reinstore'])->name('matricula.reinstore'); 
    Route::delete('/matricula/{alumno}/{grupo}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');
    Route::get('/matricula/agregar/{alumno}/{grupo}', [MatriculaController::class, 'agregar'])->name('matricula.agregar');
    Route::get('/matricula/edit/{persona}/{grupo}', [MatriculaController::class, 'edit'])->name('matricula.edit');
    Route::patch('/matricula/actualizar/{persona}/{grupo}', [MatriculaController::class, 'update'])->name('matricula.update');
    Route::get('/matricula/alta/{grupo}', [MatriculaController::class, 'alta'])->name('matricula.alta');
});

Route::middleware('auth')->group(function () {
    Route::get('/maestros', [MaestroController::class, 'index'])->name('maestros.index');
    Route::get('/maestros/create', [MaestroController::class, 'create'])->name('maestros.create');
    Route::post('/maestros/store', [MaestroController::class, 'store'])->name('maestros.store');
    Route::delete('/maestros/{maestro}', [MaestroController::class, 'destroy'])->name('maestros.destroy');
    Route::get('/maestros/{persona}/edit', [MaestroController::class, 'edit'])->name('maestros.edit');
    Route::patch('/maestros/{persona}', [MaestroController::class, 'update'])->name('maestros.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/coordinadores', [CoordinadorController::class, 'index'])->name('coordinadores.index');    
    Route::post('/cordinadores/store', [CoordinadorController::class, 'store'])->name('coordinadores.store');
    Route::delete('/coordinadores/{coordinador}', [CoordinadorController::class, 'destroy'])->name('coordinadores.destroy');
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

require __DIR__ . '/auth.php';
