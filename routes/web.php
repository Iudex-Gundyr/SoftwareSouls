<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\HerramientasController;
use App\Http\Controllers\SoftwareSoulsController;
use App\Http\Controllers\HerramientaProyectoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FirmaSoftwareSouls;
//Todos los usuarios
Route::get('/', [SoftwareSoulsController::class, 'cargarSoftwareSouls'])->name('inicio');
Route::get('/obtener', [SoftwareSoulsController::class, 'obtenerProyectos'])->name('obtener');
Route::get('/login', function () {return view('Administrador/login');})->name('login')->middleware('guest');
Route::get('/home', function () {return redirect('/Proyectos');})->name('/home')->middleware('auth');
Route::get('/proyecto/{id}', [SoftwareSoulsController::class, 'proyecto'])->name('proyecto');


//Usuarios con cuenta

//CRD
Route::post('/subirHerramientaProyecto/{id_publicacion}',[HerramientaProyectoController::class, 'subirHerramientaProyecto'])->name('subirHerramientaProyecto')->middleware('auth');
Route::get('/eliminarHerramientaPublicacion/{id}',[HerramientaProyectoController::class, 'eliminarHerramientaPublicacion'])->name('eliminarHerramientaPublicacion')->middleware('auth');
//CRD Imagenes Proyecto
Route::post('/subirimagen/{id_publicacion}', [FotosController::class, 'subirImagen'])->name('subirimagen');
Route::get('/eliminarFoto/{id}',[FotosController::class, 'eliminarFoto'])->name('eliminarFoto')->middleware('auth');
//CRUD PROYECTOS
Route::get('/Proyectos', function () {return view('Administrador/CRUD/Proyectos/Proyectos');})->middleware('auth');
Route::post('/crearProyecto',[ProyectoController::class, 'crearProyecto'])->name('crearProyecto')->middleware('auth');
Route::get('/Proyectos', [ProyectoController::class, 'listarProyectos'])->name('Proyectos')->middleware('auth');
Route::get('/ModificarProyecto/{id}', [ProyectoController::class, 'mostrarFormularioModificar'])->name('ModificarProyecto')->middleware('auth');
Route::put('/ActualizarProyecto/{id}', [ProyectoController::class, 'ActualizarProyecto'])->name('ActualizarProyecto')->middleware('auth');
Route::get('/eliminarProyecto/{id}',[ProyectoController::class, 'eliminarProyecto'])->name('eliminarProyecto')->middleware('auth');
//CRUD USUARIO
Route::get('/Usuarios', function () {return view('Administrador/CRUD/Usuario/Usuario');})->middleware('auth');
Route::post('/registrar',[LoginController::class, 'registrar'])->name('registrar')->middleware('auth');
Route::get('/Usuarios', [LoginController::class, 'listarusuarios'])->name('Usuarios')->middleware('auth');
Route::get('/EliminarUsuario/{id}', [LoginController::class, 'eliminarUsuario'])->name('EliminarUsuario')->middleware('auth');
Route::get('/ModificarUsuario/{id}', [LoginController::class, 'mostrarFormularioModificar'])->name('ModificarUsuario')->middleware('auth');
Route::put('/actualizar-usuario/{id}', [LoginController::class, 'actualizarUsuario'])->name('actualizar-usuario')->middleware('auth');
//Login Controller
Route::post('/startsession', [LoginController::class, 'startsession']);
Route::get('/logout',[LoginController::class, 'logout']);


//CRUD HERRAMIENTAS
Route::get('/Herramientas',function(){return view('Administrador/CRUD/Herramientas/Herramientas');})->name('Herramientas')->middleware('auth');
Route::post('/subirHerramienta',[HerramientasController::class, 'subirHerramienta'])->name('subirHerramienta')->middleware('auth');
Route::get('/Herramientas', [HerramientasController::class, 'listarHerramientas'])->name('subirHerramientas')->middleware('auth');
Route::get('/eliminarHerramienta/{id}',[HerramientasController::class, 'eliminarHerramienta'])->name('eliminarHerramienta')->middleware('auth');
Route::get('/modificarHerramienta/{id}',[HerramientasController::class, 'modificarHerramienta'])->name('modificarHerramienta')->middleware('auth');
Route::put('/ActualizarHerramienta/{id}', [HerramientasController::class, 'actualizarHerramienta'])->name('ActualizarHerramienta')->middleware('auth');


//Correo Electronico

Route::post('/sendEmail',[ContactController::class,'sendEmail'])->name('sendEmail');
Route::get('/Email', function () {return view('emails/solicitud');});


//Firma

Route::get('/FirmaSoftwareSouls',[FirmaSoftwareSouls::class,'FirmaSoftwareSouls']);