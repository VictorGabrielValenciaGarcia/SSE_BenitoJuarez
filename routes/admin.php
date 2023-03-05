<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AlumnosController;
use App\Http\Controllers\Admin\CalificacionesController;
use App\Http\Controllers\Admin\DocentesController;
use App\Http\Controllers\Admin\GruposController;
use App\Http\Controllers\Admin\MateriasController;
use App\Http\Controllers\Admin\TutoresController;
use App\Http\Controllers\Admin\UserController;

Route::get('/',[HomeController::class,'index'])->name('home');

// Calificaciones
    // Route::get('/calificaciones/list',[GruposController::class,'index'])->middleware('can:admin.grupos.index')->name('grupos.index');
    Route::get('/calificaciones/actions',[CalificacionesController::class,'index'])->middleware('can:admin.calif.index')->name('calif.index');
    Route::get('/calificaciones/create',[CalificacionesController::class,'create'])->middleware('can:admin.calif.create')->name('calif.create');
    Route::post('/calificaciones', [CalificacionesController::class,'store'])->name('calif.store');
    Route::get('/calificaciones/edit/{id}', [CalificacionesController::class,'edit'])->middleware('can:admin.calif.edit')->name('calif.edit');
    Route::patch('/calificaciones/update', [CalificacionesController::class,'update'])->name('calif.update');
    // Route::get('/calificaciones/{id}', [CalificacionesController::class,'show'])->middleware('can:admin.calif.show')->name('calif.show');
    Route::delete('/calificaciones/eliminar/{id}', [CalificacionesController::class,'destroy'])->middleware('can:admin.grupos.destroy')->name('calif.destroy');

// Grupos
    Route::get('/grupos/list',[GruposController::class,'index'])->middleware('can:admin.grupos.index')->name('grupos.index');
    Route::get('/grupos/actions',[GruposController::class,'list'])->middleware('can:admin.grupos.list')->name('grupos.list');
    Route::get('/grupos/create',[GruposController::class,'create'])->middleware('can:admin.grupos.create')->name('grupos.create');
    Route::post('/grupos', [GruposController::class,'store'])->name('grupos.store');
    Route::get('/grupos/edit/{id}', [GruposController::class,'edit'])->middleware('can:admin.grupos.edit')->name('grupos.edit');
    Route::patch('/grupos/update', [GruposController::class,'update'])->name('grupos.update');
    Route::get('/grupos/{id}', [GruposController::class,'show'])->middleware('can:admin.grupos.show')->name('grupos.show');
    Route::delete('/grupos/eliminar/{id}', [GruposController::class,'destroy'])->middleware('can:admin.grupos.destroy')->name('grupos.destroy');

// Tutores
    Route::get('/tutores/assingments',[TutoresController::class,'assingments'])->middleware('can:admin.tutores.assingments')->name('tutores.assingments');

    Route::get('/tutores/assing',[TutoresController::class,'assing'])->middleware('can:admin.tutores.assing')->name('tutores.assing');
    Route::post('/tutores/assingTutor', [TutoresController::class,'assingTutor'])->name('tutores.assingTutor');

    Route::get('/tutores/reassing/{id}',[TutoresController::class,'reassing'])->middleware('can:admin.tutores.reassing')->name('tutores.reassing');
    Route::patch('/tutores/reassingTutor', [TutoresController::class,'reassingTutor'])->name('tutores.reassingTutor');
    Route::delete('/tutores/assingments/{id}', [TutoresController::class,'destroyAssig'])->middleware('can:admin.tutores.destroyAssig')->name('tutores.destroyAssig');

    Route::get('/tutores/list',[TutoresController::class,'index'])->middleware('can:admin.tutores.index')->name('tutores.index');
    Route::get('/tutores/actions',[TutoresController::class,'list'])->middleware('can:admin.tutores.list')->name('tutores.list');
    Route::get('/tutores/create',[TutoresController::class,'create'])->middleware('can:admin.tutores.create')->name('tutores.create');
    Route::post('/tutores', [TutoresController::class,'store'])->name('tutores.store');
    Route::get('/tutores/edit/{id}', [TutoresController::class,'edit'])->middleware('can:admin.tutores.edit')->name('tutores.edit');
    Route::patch('/tutores/update', [TutoresController::class,'update'])->name('tutores.update');
    Route::get('/tutores/{id}', [TutoresController::class,'show'])->middleware('can:admin.tutores.show')->name('tutores.show');
    Route::delete('/tutores/eliminar/{id}', [TutoresController::class,'destroy'])->middleware('can:admin.tutores.destroy')->name('tutores.destroy');

// Alumnos
    Route::get('/alumnos/list',[AlumnosController::class,'index'])->middleware('can:admin.alumnos.index')->name('alumnos.index');
    Route::get('/alumnos/actions',[AlumnosController::class,'list'])->middleware('can:admin.alumnos.list')->name('alumnos.list');
    Route::get('/alumnos/create',[AlumnosController::class,'create'])->middleware('can:admin.alumnos.create')->name('alumnos.create');
    Route::post('/alumnos', [AlumnosController::class,'store'])->name('alumnos.store');
    Route::get('/alumnos/edit/{id}', [AlumnosController::class,'edit'])->middleware('can:admin.alumnos.edit')->name('alumnos.edit');
    Route::patch('/alumnos/update', [AlumnosController::class,'update'])->name('alumnos.update');
    Route::get('/alumnos/{id}', [AlumnosController::class,'show'])->middleware('can:admin.alumnos.show')->name('alumnos.show');
    Route::delete('/alumnos/eliminar/{id}', [AlumnosController::class,'destroy'])->middleware('can:admin.alumnos.destroy')->name('alumnos.destroy');

// Materias
    Route::get('/materias/list',[MateriasController::class,'index'])->middleware('can:admin.materias.index')->name('materias.index');
    Route::get('/materias/actions',[MateriasController::class,'list'])->middleware('can:admin.materias.list')->name('materias.list');
    Route::get('/materias/create',[MateriasController::class,'create'])->middleware('can:admin.materias.create')->name('materias.create');
    Route::post('/materias', [MateriasController::class,'store'])->name('materias.store');
    Route::get('/materias/edit/{id}', [MateriasController::class,'edit'])->middleware('can:admin.materias.edit')->name('materias.edit');
    Route::patch('/materias/update', [MateriasController::class,'update'])->name('materias.update');
    Route::get('/materias/{id}', [MateriasController::class,'show'])->middleware('can:admin.materias.show')->name('materias.show');
    Route::delete('/materias/eliminar/{id}', [MateriasController::class,'destroy'])->middleware('can:admin.materias.destroy')->name('materias.destroy');

// Docentes
    Route::get('/docentes/list',[DocentesController::class,'index'])->middleware('can:admin.docentes.index')->name('docentes.index');
    Route::get('/docentes/actions',[DocentesController::class,'list'])->middleware('can:admin.docentes.list')->name('docentes.list');
    Route::get('/docentes/create',[DocentesController::class,'create'])->middleware('can:admin.docentes.create')->name('docentes.create');
    Route::post('/docentes', [DocentesController::class,'store'])->name('docentes.store');
    Route::get('/docentes/edit/{id}', [DocentesController::class,'edit'])->middleware('can:admin.docentes.edit')->name('docentes.edit');
    Route::patch('/docentes/update', [DocentesController::class,'update'])->name('docentes.update');
    Route::get('/docentes/{id}', [DocentesController::class,'show'])->middleware('can:admin.docentes.show')->name('docentes.show');
    Route::delete('/docentes/eliminar/{id}', [DocentesController::class,'destroy'])->middleware('can:admin.docentes.destroy')->name('docentes.destroy');


    //Users

    Route::resource('user', UserController::class)->only('index', 'edit', 'update')->names('admin.users');


?>
