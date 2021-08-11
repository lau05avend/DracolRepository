<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DisenoController;
use App\Http\Controllers\EstadoActividadController;
use App\Http\Controllers\FaseTareaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TipoObraController;
use App\Http\Controllers\UsuarioController;
use App\Models\Cliente;
use App\Models\Diseno;
use App\Models\EstadoActividad;
use App\Models\FaseTarea;
use App\Models\Material;
use App\Models\Planilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('cliente', function () {
    return view('Clientes.index');
});

Route::get('cliente/create', function () {
    return view('Clientes.create');
});

// Route::post('cliente/', function () {
//     echo $_POST['NombreObra'];
// })->name('obrapru');

//tipo obra
Route::resource('tipoobra', TipoObraController::class)->names('tipoobra');

//obra
Route::resource('obra', ObraController::class)->names('obra');
Route::get('obra/des', ObraController::class,'ObraController@desactive')->names('obra.desactive');

//actividad
Route::resource('actividad', ActividadController::class)->names('activity');

//usuarios
Route::resource('usuario', UsuarioController::class)->names('usuarios');

//Novedad
Route::resource('novedad',NovedadController::class)->names('novedad');

//Clientes
route:: resource('cliente' ,ClienteController::class)->names('clientes');

//diseno
route:: resource('diseno',DisenoController::class)->names('diseno');

//material
route:: resource('material',MaterialController::class)->names('material');

//planilla
route:: resource('planilla',PlanillaController::class)->names('planilla');

//secciones
route:: resource('secciones',SeccionController::class)->names('secciones');

//fasetarea
route:: resource('fasetarea',FaseTareaController::class)->names('fasetarea');

//estado actividad
route:: resource('estadoactividad',EstadoActividadController::class)->names('estadoactividad');


