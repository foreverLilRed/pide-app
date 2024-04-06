<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\CredencialesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\Imagenes;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serviciosController ;
use App\Http\Controllers\registrosController ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','actividad'])->name('dashboard');

Route::middleware(['auth', 'verified','nivel2','actividad'])->group(function(){
    Route::get('/credenciales', [CredencialesController::class,'index'])->name('credenciales');
    Route::put('actualizacion/{id}', [CredencialesController::class,'update'])->name('actualizacion');
    Route::get('/bitacora', [bitacoraController::class,'index'])->name('bitacora');
    Route::get('/datos/bitacora/{busqueda}', [bitacoraController::class,'bitacoraJSON'])->name('datos-bitacora');
    Route::get('/datos/bitacora/fecha/{fecha}', [bitacoraController::class,'buscarPorFecha'])->name('fecha-bitacora');
    Route::get('/data-bitacora', [bitacoraController::class,'todobitacoraJSON'])->name('data-bitacora');
    Route::get('usuarios/mostrar',[UsersController::class,'index'])->name('listar');
    Route::get('usuarios/editar/{id}',[UsersController::class,'edit'])->name('editar');
    Route::put('usuarios/{id}', [UsersController::class,'update'])->name('update');
    Route::delete('/usuarios/eliminar/{id}',[UsersController::class,'destroy'])->name('eliminar');
    Route::delete('/eliminar-grupo/{id}',[GruposController::class,'destroy'])->name('eliminar-grupo');
    Route::get('usuarios/agregar',[UsersController::class,'add'])->name('agregar');
    Route::post('usuarios/crear',[UsersController::class,'store'])->name('crear');
    Route::post('/credencialesadd', [CredencialesController::class,'store'])->name('addcredencial');
    Route::get('/usuarios/buscar/{nombre}',[UsersController::class,'busqueda'])->name('buscar');
    Route::get('/grupos',[GruposController::class,'index'])->name('grupos');
    Route::post('/editar-grupo',[GruposController::class,'editar'])->name('editar-grupo');
    Route::get('/datos-grupo',[GruposController::class,'buscar']);
    Route::post('/agregar-datos',[GruposController::class,'store'])->name('addgrupo');
    Route::get('/datos-grupo/{id}',[GruposController::class,'obtenerUsuariosYPermisos'])->name('datos-grupo');
    Route::get('/data-users',[UsersController::class,'dataJSON'])->name('data-users');
    Route::get('/todos-usuarios',[UsersController::class,'UsuariosJSON'])->name('usuarios-json');
    Route::get('/buscar-usuarios/{busqueda}', [UsersController::class,'BusquedaJSON'])->name('usuarios-busqueda-json');
    Route::get('/estadisticas',[GruposController::class,'estadisticas'])->name('estadisticas');
});
Route::middleware(['auth', 'verified','actividad','sunat'])->group(function(){
    Route::get('/servicios/sunat', [serviciosController::class,'sunat'])->name('sunat');
    Route::get('/servicios/sunat/busqueda', [BusquedaController::class,'SUNAT'])->name('busquedaSUNAT');
});

Route::middleware(['auth', 'verified','actividad','essalud'])->group(function(){
    Route::get('/servicios/essalud', [serviciosController::class,'essalud'])->name('essalud');
    Route::get('/servicios/essalud/busqueda', [BusquedaController::class,'ESSALUD'])->name('busquedaESSALUD');
});

Route::middleware(['auth', 'verified','actividad','pj'])->group(function(){
    Route::get('/servicios/pj', [serviciosController::class,'pj'])->name('pj');
    Route::get('/servicios/pj/busqueda', [BusquedaController::class,'PJ'])->name('busquedaPJ');
});

Route::middleware(['auth', 'verified','actividad','migraciones'])->group(function(){
    Route::get('/servicios/migraciones', [serviciosController::class,'migraciones'])->name('migraciones');
    Route::get('/servicios/migraciones/busqueda', [BusquedaController::class,'MIGRACIONES'])->name('busquedaMIGRACIONES');
});

Route::middleware(['auth', 'verified','actividad','sunarp'])->group(function(){
    Route::get('/servicios/sunarp', [serviciosController::class,'sunarp'])->name('sunarp');
    Route::get('/servicios/sunarp/busqueda', [BusquedaController::class,'SUNARP'])->name('busquedaSUNARP');
});

Route::middleware(['auth', 'verified','actividad','sunedu'])->group(function(){
    Route::get('/servicios/sunedu', [serviciosController::class,'sunedu'])->name('sunedu');
    Route::get('/servicios/sunedu/busqueda', [BusquedaController::class,'SUNEDU'])->name('busquedaSUNEDU');
});

Route::middleware(['auth', 'verified','actividad','inpe'])->group(function(){
    Route::get('/servicios/inpe', [serviciosController::class,'inpe'])->name('inpe');
    Route::get('/servicios/inpe/busqueda', [BusquedaController::class,'INPE'])->name('busquedaINPE');
});

Route::middleware(['auth', 'verified','actividad','pnp'])->group(function(){
    Route::get('/servicios/pnp', [serviciosController::class,'pnp'])->name('pnp');
    Route::get('/servicios/pnp/busqueda', [BusquedaController::class,'PNP'])->name('busquedaPNP');
});

Route::middleware(['auth', 'verified','actividad','conadis'])->group(function(){
    Route::get('/servicios/conadis', [serviciosController::class,'conadis'])->name('conadis');
    Route::get('/servicios/conadis/busqueda', [BusquedaController::class,'CONADIS'])->name('busquedaCONADIS');
});

Route::middleware(['auth', 'verified','actividad','reniec'])->group(function(){
    Route::get('/servicios/reniec', [serviciosController::class,'reniec'])->name('reniec');
    Route::get('/servicios/reniec/busqueda', [BusquedaController::class,'RENIEC'])->name('busquedaRENIEC');
    Route::get('/servicios/reniec/busqueda-local', [LocalController::class,'LOCALRENIEC'])->name('busquedaLOCALRENIEC');
    Route::get('/servicios/reniec/guardar-datos', [LocalController::class, 'store'])->name('guardarRENIEC');

});

Route::middleware(['auth', 'verified','actividad','minsa'])->group(function(){
    Route::get('/servicios/minsa', [serviciosController::class,'minsa'])->name('minsa');
    Route::get('/servicios/minsa/busqueda', [BusquedaController::class,'MINSA'])->name('busquedaMINSA');
});

Route::middleware(['auth', 'verified','actividad','mtc'])->group(function(){
    Route::get('/servicios/mtc', [serviciosController::class,'mtc'])->name('mtc');
    Route::get('/servicios/mtc/busqueda', [BusquedaController::class,'MTC'])->name('busquedaMTC');
});

Route::middleware(['auth', 'verified','actividad','minedu'])->group(function(){
    Route::get('/servicios/minedu', [serviciosController::class,'minedu'])->name('minedu');
    Route::get('/servicios/minedu/busqueda', [BusquedaController::class,'MINEDU'])->name('busquedaMINEDU');
});

Route::middleware(['auth', 'verified','actividad'])->group(function(){
    Route::post('/registro', [registrosController::class,'registrar'])->name('registro');
    Route::get('/servicios',[serviciosController::class,'index'])->name('inicio');
    Route::get('/servicios/informacion', [BusquedaController::class,'info'])->name('error');
    Route::post('/pdf', [PdfController::class,'generarPDF'])->name('pdf'); 
});

Route::middleware(['auth','actividad'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
