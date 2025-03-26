<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EjeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\ProyectoEquipo;
use App\Models\ProyectoHorario;
use App\Models\GrupoMateria;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    Route::get('/proyectos/eje/catalogo', [ProyectoController::class, 'catalogo'])->name('proyectos.catalogo');
    Route::get('/proyectos/coordinador/catalogo', [ProyectoController::class, 'catalogoCompleto'])->name('proyectos.catalogoCompleto');
    Route::get('/proyectos/evaluar/{usuario}', [ProyectoController::class, 'evaluar'])->name('proyectos.evaluar');
    Route::get('/proyectos/fechas/semana', [ProyectoController::class, 'fechas'])->name('proyectos.fechas');
    Route::post('/proyectos/fechastore', [ProyectoController::class, 'fechaStore'])->name('proyectos.fechaStore');
    Route::delete('/proyectos/eliminar/{dia}', [ProyectoController::class, 'fechaDestroy'])->name('proyectos.fechaDestroy');
    Route::get('/proyectos/evaluacion-proyecto/{equipo}', [ProyectoController::class, 'evaluacionProyecto'])->name('proyectos.evaluacionProyecto');
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
    Route::get('/divisiones/edit/{division}', [DivisionController::class, 'edit'])->name('divisiones.edit');
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
    Route::delete('/equipos/destroy/{pequipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    Route::delete('/equipos/delete/{palumno}', [EquipoController::class, 'deleteAlumno'])->name('equipos.deleteAlumno');
    Route::get('/equipos/edit/{equipo}', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::patch('/equipos/update/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::get('/equipos/search/{equipo}', [EquipoController::class, 'search'])->name('equipos.search');
    Route::get('/equipos/agregar/{pequipo}/{alumno}', [EquipoController::class, 'agregar'])->name('equipos.agregar');
    Route::get('/equipos/entregables/{pequipo}/{usuario}', [EquipoController::class, 'entregables'])->name('equipos.entregables');
    Route::post('/equipos/upload/{pequipo}/{usuario}', [EquipoController::class, 'storeEntregables'])->name('equipos.storeEntregables');
    Route::delete('/equipos/entregables/destroy/{id}/{usuario}/{pequipo}', [EquipoController::class, 'destroyEntregables'])->name('equipos.destroyEntregables');
    Route::get('/equipos/registrados/{usuario}', [EquipoController::class, 'registrados'])->name('equipos.registrados');
    Route::get('/equipos/registrados-mostrar/{usuario}/{carrera_id}/{turno_id}/{periodo_id}', [EquipoController::class, 'showRegistrados'])->name('equipos.showRegistrados');
    Route::get('/equipos/registrados-integrantes/{equipo}', [EquipoController::class, 'registradosIntegrantes'])->name('equipos.registradosIntegrantes');
    Route::get('/equipos/registrados-entregables/{equipo}', [EquipoController::class, 'registradosEntregables'])->name('equipos.registradosEntregables');
    Route::get('/equipo/alumno', [EquipoController::class, 'alumnoEquipo'])->name('equipos.alumno');
    Route::get('/equipos/entregables/{pequipo}', [EquipoController::class, 'alumnoEntregables'])->name('equipos.alumnoEntregables');
});

Route::middleware('auth')->group(function () {
    Route::get('/horarios/index/{usuario}', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/horarios/create/{usuario}', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/horarios/store/{usuario}', [HorarioController::class, 'store'])->name('horarios.store');
    Route::get('/horarios/show/{usuario}', [horarioController::class, 'show'])->name('horarios.show');
    Route::delete('/horarios/destroy/{horario}/{aula}/{turno}', [HorarioController::class, 'destroy'])->name('horarios.destroy');

    Route::get('horarios/{id}/grupos', function ($id) {
        $carrera = Carrera::find($id);
        $periodo = Periodo::where('activo', 1)->first();
        $usuario = Auth::user();
        $coordinador = Coordinador::where('periodo_id', $periodo->id)->where('maestro_id', $usuario->persona->maestro->id)->first();
        $grupos = Grupo::where('carrera_id', $carrera->id)->where('periodo_id', $periodo->id)->where('turno_id', $coordinador->turno_id)->orderBy('grado')->orderBy('grupo')->get();
        return $grupos;
    });

    Route::get('horarios/{id}/equipos', function ($id) {
        $equipos = ProyectoEquipo::where('grupo_id', $id)
            ->whereNOTIn('proyecto_equipos.id', function ($query) {
                $periodo = Periodo::where('activo', 1)->first();
                $query->select('proyecto_horarios.equipo_id')->from('proyecto_horarios')->where('proyecto_horarios.periodo_id', $periodo->id);
            })
            ->get();
        return $equipos;
    });

    Route::get('horarios/{aulaId}/{diaId}/horas', function ($aulaId, $diaId) {
        $periodo = Periodo::where('activo', 1)->first();
        $horas = ProyectoHorario::where('periodo_id', $periodo->id)
            ->where('aula_id', $aulaId)
            ->where('dia_id', $diaId)
            ->get();
        return $horas;
    });

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
    Route::get('/grupos/showGrupos/{id}/{turno}', [GrupoController::class, 'showGrupos'])->name('grupos.showGrupos');
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
    Route::get('/maestros/show/{maestro}', [MaestroController::class, 'show'])->name('maestros.show');
    Route::get('/maestros/search', [MaestroController::class, 'search'])->name('maestros.search');
    Route::get('/maestros/activar/{maestro}', [MaestroController::class, 'activar'])->name('maestros.activar');
    Route::get('/maestros/eliminar/{maestro}', function ($maestroId) {
        $periodo = Periodo::where('activo', 1)->first();
        $gm = GrupoMateria::where('maestro_id', $maestroId)->get();
        if ($gm != null) {
            return true;
        } else {
            return false;
        }
    })->name('maestros.eliminar');
});

Route::middleware('auth')->group(function () {
    Route::get('/coordinadores', [CoordinadorController::class, 'index'])->name('coordinadores.index');
    Route::post('/cordinadores/store', [CoordinadorController::class, 'store'])->name('coordinadores.store');
    Route::delete('/coordinadores/{coordinador}', [CoordinadorController::class, 'destroy'])->name('coordinadores.destroy');
});

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/goole-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([

        'email' => $user_google->email,
        ], [
        'name'  => $user_google->name,
        'email' => $user_google->email,
        'google_id' => $user_google->id,
        'password' => $user_google->id,
        ]);

    Auth::login($user);

    return redirect('/dashboard');
})->name('google.callback');

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
