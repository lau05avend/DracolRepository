<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DisenoController;
use App\Http\Controllers\EstadoActividadController;
use App\Http\Controllers\FaseTareaController;
use App\Http\Controllers\LugarNacimientoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TipoMaterialController;
use App\Http\Controllers\TipoObraController;
use App\Http\Controllers\UsuarioController;
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


// Route::post('cliente/', function () {
//     echo $_POST['NombreObra'];
// })->name('obrapru');

//tipo obra
Route::resource('tipoobra', TipoObraController::class)->names('tipoobra');

//obra
Route::resource('obra', ObraController::class)->names('obra');
// Route::get('obra/des', ObraController::class,'ObraController@desactive')->names('obra.desactive');
Route::get('editUs/{obra}/edit', [ObraController::class,"editUsers"])->name('editarusO');
Route::post('updateUs/{obra}', [ObraController::class,"Usuarios"])->name('updateUs');

//actividad
Route::resource('actividad', ActividadController::class)->names('activity');
Route::get('act-users/{actividad}/edit', [ActividadController::class,"editUs"])->name('editus');
Route::post('act-users/{actividad}', [ActividadController::class,"Usuarios"])->name('regUs');

//usuarios
Route::resource('usuario', UsuarioController::class)->names('usuarios');

//Novedad
Route::resource('novedad',NovedadController::class)->names('novedad');

//Clientes
route::resource('cliente' ,ClienteController::class)->names('clientes');

//diseno
route::resource('diseno',DisenoController::class)->names('diseno');

//material
route::resource('material',MaterialController::class)->names('material');

//tipo-material
Route::resource('TipoMaterial', TipoMaterialController::class)->names('TipoMaterial');

//planilla
route::resource('planilla',PlanillaController::class)->names('planilla');

//secciones
route::resource('secciones',SeccionController::class)->names('secciones');

//fasetarea
route::resource('fasetarea',FaseTareaController::class)->names('fasetarea');

//estado actividad
route::resource('estadoactividad',EstadoActividadController::class)->names('estadoactividad');

//lugar nacimiento
Route::resource('ciudad', LugarNacimientoController::class)->names('ciudad');

//TIPO MATERIAL - MATERIAL

Route::get('intermat',function(){
    return view('intersecciones.mate');
})->name('intersecciones');

