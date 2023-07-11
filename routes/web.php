<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PtemasController;
use App\Http\Controllers\ItemasController;
use App\Http\Controllers\PapoyosController;
use App\Http\Controllers\IapoyosController;
use App\Http\Controllers\PrecursosController;
use App\Http\Controllers\IrecursosController;
use App\Http\Controllers\CuestionarioController;



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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('grupos', App\Http\Controllers\GrupoController::class);
Route::resource('grados', App\Http\Controllers\GradoController::class);
Route::resource('instituciones', App\Http\Controllers\InstitucioneController::class);
Route::resource('temas', App\Http\Controllers\TemaController::class);
Route::resource('encuestas', App\Http\Controllers\EncuestaController::class);
Route::resource('preguntas', App\Http\Controllers\PreguntaController::class);
Route::resource('repuestas', App\Http\Controllers\RepuestaController::class);
Route::resource('ponderaciones', App\Http\Controllers\PonderacioneController::class);
Route::resource('cuestionarios', App\Http\Controllers\CuestionarioController::class);
Route::resource('apoyos', App\Http\Controllers\ApoyoController::class);
Route::resource('recusos', App\Http\Controllers\RecusoController::class);


Route::get('/PTemas', [PtemasController::class, 'index'])->name('PTemas');
Route::get('/Itemas/{id}', [ItemasController::class, 'show'])->name('Itemas');

Route::get('/Papoyos', [PapoyosController::class, 'index'])->name('Papoyos');
Route::get('/Iapoyos/{id}', [IapoyosController::class, 'show'])->name('Iapoyos');

Route::get('/Precursos', [PrecursosController::class, 'index'])->name('Precursos');
Route::get('/Irecursos/{id}', [IrecursosController::class, 'show'])->name('Irecursos');

Route::get('/cuestionarioss', [CuestionarioController::class, 'mostrarCuestionarios'])->name('cuestionarios.mostrar');


Route::get('/cuestionario/{id}',[CuestionarioController::class,'mostrarCuestionarios']);

Route::post('/cuestionario/guardar',[CuestionarioController::class,'guardarCuestionarios']);

