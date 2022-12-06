<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\OficioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ClinicaServicioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\TipoAfiliadoController;
use App\Http\Controllers\SuspencionController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\Rev_SuspencionController;
use App\Http\Controllers\Rev_OficioController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\Oficio_SuspencionController;
use App\Http\Controllers\CreateSuspencionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\EditarOficioController;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\ArchivoController;

use App\Http\Controllers\FormularioSuspencionController;
use App\Http\Controllers\FormularioSuspencionEditController;

use App\Http\Controllers\ChangesPasswordController;

use Illuminate\Support\Facades\Route;
use Auth;

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
#Route::resource('/home', HomeController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/changes_password/{id}',[ChangesPasswordController::class, 'index'])->name('changes_password');
    Route::post('update_password/{id}',[ChangesPasswordController::class, 'update'])->name('update_password');
    Route::post('reset_password/{id}',[ChangesPasswordController::class, 'resetpass'])->name('reset_password');

    Route::resource('/especialidades', EspecialidadController::class);
    Route::resource('/areas', AreaController::class);
    Route::resource('/clinicas_servicios', ClinicaServicioController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('roles', RoleController::class);

    Route::get('oficios/pdf', [OficioController::class, 'pdf'] )->name('oficios.pdf');
    route::resource('/ofisusp', Oficio_SuspencionController::class);
    Route::resource('/createsuspencions', CreateSuspencionController::class);
    Route::resource('/agregarformularios', FormularioSuspencionController::class);
    Route::resource('/editarformularios', FormularioSuspencionEditController::class);
    Route::resource('/requerimientos', RequerimientoController::class);
    Route::resource('/editaroficios', EditarOficioController::class);
    Route::resource('/agregarsuspenciones', EditarOficioSuspencionController::class);
    Route::resource('/suspencions', SuspencionController::class);
    Route::resource('/formularios', FormularioController::class);
    Route::resource('/revsusp', Rev_SuspencionController::class);
    Route::resource('/revofi',Rev_OficioController::class);

    Route::resource('/afiliados', AfiliadoController::class);
    Route::resource('/tipo_afiliados', TipoAfiliadoController::class);
    Route::resource('/suspencions', SuspencionController::class);
    Route::resource('/formularios', FormularioController::class);
    Route::resource('/medico', MedicoController::class);
    Route::resource('/createsuspencions', CreateSuspencionController::class);
    Route::resource('/agregarformularios', FormularioSuspencionController::class);
    Route::resource('/riesgos', RiesgoController::class);
    Route::resource('/dependencias', DependenciaController::class);

    Route::resource('/susp', SuspController::class);
    Route::resource('/ofi',OfiController::class);
    Route::resource('/reportes', ReportesController::class);
    Route::resource('/revreq', RequerimientoController::class);
    Route::resource('/gen', GeneralController::class);
    Route::resource('/oficios', OficioController::class);
    Route::resource('/arch', ArchivoController::class);

    Route::resource('/oficios', OficioController::class);
    Route::resource('/reportes', ReporteController::class);
    Route::resource('/req', ReqController::class);
    Route::resource('/historial', BusquedaHistorialController::class);    

    

});








