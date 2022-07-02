<?php

use App\Http\Controllers\Admin\recuperarcontrasenacontroller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Cobro\cajareportecontroller;
use App\Http\Controllers\Cobro\Cajascontroller;
use App\Http\Controllers\Cobro\cobroextras;
use App\Http\Controllers\Cobro\cobropendientecontroller;
use App\Http\Controllers\Cobro\gerentecontroller;
use App\Http\Controllers\Cobro\reporteeditcontroller;
use App\Http\Controllers\Compras\Articulocontroller;
use App\Http\Controllers\Compras\Compracontroller;
use App\Http\Controllers\Compras\Marcacontroller;
use App\Http\Controllers\Compras\Proveedorcontroller;
use App\Http\Controllers\contratosclientes\cclicontratoclientecontroller;
use App\Http\Controllers\contratosclientes\cclitipoclientecontroller;
use App\Http\Controllers\cuantasporcobrar\cuentascontrollerpoocobrar;
use App\Http\Controllers\cuantasporcobrar\datatablecuentasporcobrar;
use App\Http\Controllers\cuantasporcobrar\mostrarclientescobrar;
use Illuminate\Support\Facades\Route;
// debes poner la ruta 
use App\Http\Controllers\soporte\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Inventario\inventariocontroller;
use App\Http\Controllers\Inventario\registrolocalcontroller;
use App\Http\Controllers\listadocobro\listadocobrocontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\nominapagos\nominapagoscontroller;
use App\Http\Controllers\nominapagos\nominareporteescontroller;
use App\Http\Controllers\paginaweb\equipotrabajocontroller;
use App\Http\Controllers\paginaweb\planescontroller;
use App\Http\Controllers\paginaweb\promocionescontroller;
use App\Http\Controllers\paginaweb\quiensomoscontroller;
use App\Http\Controllers\paginaweb\serviciocontroller;
use App\Http\Controllers\promocion\promacioncontroller;
use App\Http\Controllers\promocion\promocioncontrallerdetalle;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\recursoshumanos\rrhareacontroller;
use App\Http\Controllers\recursoshumanos\rrhasistenciacontroller;
use App\Http\Controllers\recursoshumanos\rrhasistenciacontrollerdiaria;
use App\Http\Controllers\recursoshumanos\rrhasistenciacontrolmensual;
use App\Http\Controllers\recursoshumanos\rrhcargafamiliarcontroller;
use App\Http\Controllers\recursoshumanos\Rrhcargocontroller;
use App\Http\Controllers\recursoshumanos\rrhcontratocontroller;
use App\Http\Controllers\recursoshumanos\rrhempleadocontroller;
use App\Http\Controllers\recursoshumanos\rrhfaltascontroller;
use App\Http\Controllers\recursoshumanos\rrhprofesioncontroller;
use App\Http\Controllers\recursoshumanos\rrhtipocontratocontroller;
use App\Http\Controllers\soporte\btnnovedaddatabler;
use App\Http\Controllers\soporte\CantonController;
use App\Http\Controllers\soporte\clientesagregarcontroller;
use App\Http\Controllers\soporte\editarreportefibra;
use App\Http\Controllers\soporte\editarreporteradio;
use App\Http\Controllers\soporte\NovedadController;
use App\Http\Controllers\soporte\novedadupdatecontroller;
use App\Http\Controllers\soporte\PdfControllerr;
use App\Http\Controllers\soporte\reportefibra;
use App\Http\Controllers\soporte\reporteradio;
use App\Http\Controllers\soporte\soporteController;
use App\Http\Controllers\cajareporteultimo\utimocliente;
use App\Http\Controllers\cajareporteultimo\utimoextras;
use App\Http\Controllers\cajareporteultimo\utimogastos;
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


Route::resource('recuperar', recuperarcontrasenacontroller::class);

// controlador ->middleware('auth') esto te ayuda a no ingresar sin antes este autenticado
Route::get('/', HomeController::class)->name('__invoke')->middleware('auth');
// sistema de logueo debes con controlador es logincontroller

Route::get('login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'validar'])->name('login.validar');
Route::get('logout', [LoginController::class,'logout'])->name('logout.logout');
//Route::get('users',[UserController::class,'index'])->name('users.users')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', Permiso::class);
 
  // Route::get('clientes',[ClienteController::class,'clientelistar']);
 //   Route::resource('products', ProductController::class);
});


Route::group(['middleware' => ['auth','role:Administrativo']], function() {
    // usuario
    Route::resource('users', recuperarcontrasenacontroller::class);
    
    
        // cuentas
        Route::resource('users', UserController::class);
// cargos
Route::resource('rhcargos', Rrhcargocontroller::class);
// area
Route::resource('rhareas', rrhareacontroller::class);
// profesiones
Route::resource('rhprofesiones',rrhprofesioncontroller::class);

// cargafamiliar
Route::resource('rhcargafamiliar',rrhcargafamiliarcontroller::class);

// Empleados
Route::resource('rhempleados',rrhempleadocontroller::class);
Route::resource('rhtipocontratos',rrhtipocontratocontroller::class);
Route::resource('rhcontratos',rrhcontratocontroller::class);

  // Route::get('clientes',[ClienteController::class,'clientelistar']);
 //   Route::resource('products', ProductController::class);

 // nominapago
Route::resource('nominapago', nominapagoscontroller::class);
// reporte
Route::resource('nominareporte', nominareporteescontroller::class);
// planes
Route::resource('planes', planescontroller::class);

//servicio
Route::resource('servicios', serviciocontroller::class);

//quiensomos
Route::resource('quiensomos', quiensomoscontroller::class);
//promocion
Route::resource('pagepromocion', promocionescontroller::class);
//equipotrabajo
Route::resource('equipotrabajo', equipotrabajocontroller::class);
// marca
Route::resource('marca',Marcacontroller::class);
// articulo
Route::resource('articulo',Articulocontroller::class);
// proveedor
Route::resource('proveedor',ProveedorController::class);

// compras
Route::resource('compra',Compracontroller::class);
});

 // contratocliente
 Route::resource('tipocontrato',cclitipoclientecontroller::class)->middleware('auth');
 Route::resource('contratoclientes',cclicontratoclientecontroller::class)->middleware('auth');

//listacobro
Route::resource('listarcobrocorte',listadocobrocontroller::class)->middleware('auth');


//cobroextra
Route::resource('asistencianocumplidas',rrhfaltascontroller::class)->middleware('auth');

//cobroextra
Route::resource('cobroextra',cobroextras::class)->middleware('auth');
// promocion
Route::resource('promocion',promacioncontroller::class)->middleware('auth');
Route::resource('promociondetalle',promocioncontrallerdetalle::class)->middleware('auth');
// gerente deja en caja
Route::resource('gerente',gerentecontroller::class)->middleware('auth');
Route::resource('mostrarclientecobrar',mostrarclientescobrar::class)->middleware('auth');


Route::resource('ultimocliente',utimocliente::class)->middleware('auth');
Route::resource('ultimoextras',utimoextras::class)->middleware('auth');
Route::resource('ultimogastos',utimogastos::class)->middleware('auth');
// gerente deja en caja
Route::resource('reportecaja',cajareportecontroller::class)->middleware('auth');
Route::resource('reportedit',reporteeditcontroller::class)->middleware('auth');

// cobros pendientes
Route::resource('cobropendiente',cobropendientecontroller::class)->middleware('auth');
// asistencia
Route::resource('rrhasistencias',rrhasistenciacontroller::class)->middleware('auth');

// cuentas por cobrar
Route::resource('cuentasporcobrar', cuentascontrollerpoocobrar::class)->middleware('auth');
    
// diaria caja
Route::resource('diariacobro', Cajascontroller::class)->middleware('auth');
// inventario
Route::resource('Inventario',inventariocontroller::class)->middleware('auth');

// inventariolocal
Route::resource('LocalInventario',registrolocalcontroller::class)->middleware('auth');
// asistencia diaria
Route::resource('rrhasistenciasdiarias',rrhasistenciacontrollerdiaria::class)->middleware('auth');
// asistencia musual
Route::resource('rrhasistenciasmusual',rrhasistenciacontrolmensual::class)->middleware('auth');

// pdfasistenciadiraia
Route::get('asistenciadiaria',[PdfControllerr::class,'reporteasistenciadiariahoy'])->name('asistenciadiaria.reporteasistenciadiariahoy')->middleware('auth');

Route::get('asistenciadiaria/{fechafinal}',[PdfControllerr::class,'reporteasistenciadiaria'])->name('asistenciadiaria.reporteasistenciadiaria')->middleware('auth');
// pdf asistencia mensual
Route::get('asistenciamensual',[PdfControllerr::class,'reportemensualasistencia'])->name('asistenciamensual.reportemensualasistencia')->middleware('auth');
Route::get('asistenciamensual/[{fehcaincial},{fechafinal}]',[PdfControllerr::class,'reportemensualasistenciafecha'])->name('asistenciamensual.reportemensualasistenciafecha')->middleware('auth');




// novedades
Route::resource('novedads', NovedadController::class)->middleware('auth');
// novedades modificar
Route::resource('novedadupdatecontroller', novedadupdatecontroller::class)->middleware('auth');
// database
Route::resource('novedadsdatabase', btnnovedaddatabler::class)->middleware('auth');
Route::get('novedadsdatabase',[btnnovedaddatabler::class,'listarcobro'])->name('novedadsdatabase.listarcobro')->middleware('auth');
//clientesrecursoshuman
Route::resource('clientes', ClienteController::class)->middleware('auth');
// cliente agregar
Route::resource('clientesagregar', clientesagregarcontroller::class)->middleware('auth');
Route::resource('soportes', soporteController::class)->middleware('auth');
Route::get('pdfclieente',[PdfControllerr::class,'clientespdfall'])->name('pdfclieente.clientespdfall')->middleware('auth');
Route::get('pdfclieente/{id}',[PdfControllerr::class,'clientegetone'])->name('pdfclieente.clientegetone')->middleware('auth');

// empleados
Route::get('pdfempleado',[PdfControllerr::class,'empleadospdfall'])->name('pdfempleado.empleadospdfall')->middleware('auth');
Route::get('pdfempleado/{id}',[PdfControllerr::class,'empleadospdfgetone'])->name('pdfempleado.empleadospdfgetone')->middleware('auth');


Route::get('pdfnovedad',[PdfControllerr::class,'novedadall'])->name('pdfnovedad.novedadall')->middleware('auth');
Route::get('pdfnovedad/{id}',[PdfControllerr::class,'novedadgetone'])->name('pdfnovedad.novedadgetone')->middleware('auth');


// ccambio dee contraseña
// usuario 
Route::get('usuario',[UsuarioController::class,'index'])->name('usuario.index')->middleware('auth');
Route::get('usuario/cambiocontrasena',[UsuarioController::class,'cambiocontrasena'])->name('usuario.cambiocontrasena')->middleware('auth');
Route::post('usuario/cambiar',[UsuarioController::class,'cambiar'])->name('usuario.cambiar')->middleware('auth');
Route::get('usuario/{user}/editar', [UsuarioController::class,'editar'])->name('usuario.editar')->middleware('auth');
Route::put('usuario/{user}', [UsuarioController::class,'update'])->name('usuario.update')->middleware('auth');


// fibra
Route::get('reporteradio',[reporteradio::class,'index'])->name('reporteradio.index')->middleware('auth');
Route::get('reportefibra',[reportefibra::class,'index'])->name('reportefibra.index')->middleware('auth');
// editarfibra
Route::resource('editarreportefibra', editarreportefibra::class)->middleware('auth');
//editarradio  
Route::resource('editarreporteradio', editarreporteradio::class)->middleware('auth');

Route::get('pdffreportefibra',[PdfControllerr::class,'soporteallfibra'])->name('pdffreportefibra.soporteallfibra')->middleware('auth');
Route::get('pdffreportefibra/{id}',[PdfControllerr::class,'soportegetonefibra'])->name('pdffreportefibra.soportegetonefibra')->middleware('auth');
Route::get('pdffreportefibranovedad/{novedad}',[PdfControllerr::class,'soportegetonefibranovedad'])->name('pdffreportefibranovedad.soportegetonefibranovedad')->middleware('auth');
Route::get('pdfffehcareportefibra/[{fehcaincial},{fechafinal}]',[PdfControllerr::class,'soporteallgetfechafibra'])
->name('pdfffehcareportefibra.soporteallgetfechafibra')->middleware('auth');

// radio pdf 
Route::get('pdffreporteradio',[PdfControllerr::class,'soporteallradio'])->name('pdffreporteradio.soporteallradio')->middleware('auth');
Route::get('pdffreporteradio/{id}',[PdfControllerr::class,'soporteallgetoneradio'])->name('pdffreporteradio.soporteallgetoneradio')->middleware('auth');
Route::get('pdffreporteradionovedad/{novedad}',[PdfControllerr::class,'soporteallgetoneradionovedad'])->name('pdffreporteradionovedad.soporteallgetoneradionovedad')->middleware('auth');
Route::get('pdfffehcareporteradio/[{fehcaincial},{fechafinal}]',[PdfControllerr::class,'soporteallgetfecharadio'])->name('pdfffehcareporteradio.soporteallgetfecharadio')->middleware('auth');

// pdf nomina
Route::get('pdfnominatotal',[PdfControllerr::class,'nominapdfall'])
->name('pdfnominatotal.nominapdfall')->middleware('auth');
Route::get('pdfnominalista/[{fehcaincial},{fechafinal}]',[PdfControllerr::class,'nominapdlista'])
->name('pdfnominalista.nominapdlista')->middleware('auth');
Route::get('pdfnominaone/{id}',[PdfControllerr::class,'nominaone'])
->name('pdfnominaone.nominaone')->middleware('auth');

// pdf compra
Route::get('pdfcompraone/{id}',[PdfControllerr::class,'compraone'])
->name('pdfcompraone.compraone')->middleware('auth');

// ruta provincia
Route::get('provincias',[ProvinciaController::class,'provincialistar'])->name('provincias.provincialistar')->middleware('auth');
Route::get('provincias/create',[ProvinciaController::class,'create'])->name('provincias.create')->middleware('auth');
Route::post('provincias/ingresar',[ProvinciaController::class,'ingresar'])->name('provincias.ingresar')->middleware('auth');
Route::get('provincias/{provincia}/edit', [ProvinciaController::class,'editar'])->name('provincias.editar')->middleware('auth');
Route::put('provincias/{provincia}', [ProvinciaController::class,'update'])->name('provincias.update')->middleware('auth');

//prueba de cuentas por cobrar datatable
Route::get('datablecuentas',[datatablecuentasporcobrar::class,'listarcuentacobrar'])->name('datablecuentas.listarcuentacobrar')->middleware('auth');
// ruta canton
Route::get('cantons',[CantonController::class,'cantonlistar'])->name('cantons.cantonlistar')->middleware('auth');
Route::get('cantons/listarcanton',[CantonController::class,'listarcanton'])->name('cantons.listarcanton')->middleware('auth');
Route::get('cantons/create',[CantonController::class,'create'])->name('cantons.create')->middleware('auth');
Route::post('cantons/ingresar',[CantonController::class,'ingresar'])->name('cantons.ingresar')->middleware('auth');
Route::get('cantons/{canton}/edit', [CantonController::class,'editar'])->name('cantons.editar')->middleware('auth');
Route::put('cantons/{canton}', [CantonController::class,'update'])->name('cantons.update')->middleware('auth');

