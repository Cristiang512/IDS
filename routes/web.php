<?php

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource ('admin','App\Http\Controllers\AdminController')->middleware('auth');

Route::resource ('identificacion','App\Http\Controllers\IdentificacionController')->middleware('auth');
Route::get('/identificacion/{id}/destroy', 'App\Http\Controllers\IdentificacionController@destroy')->name('auth');

Route::get('/change-password', 'App\Http\Controllers\IdentificacionController@changePassword')->name('change-password');
Route::post('/change-password', 'App\Http\Controllers\IdentificacionController@updatePassword')->name('update-password');

Route::resource ('informacion','App\Http\Controllers\InformacionController')->middleware('auth');
Route::get('/informacion/{id}/index','App\Http\Controllers\InformacionController@index')->name('auth');
Route::get('/informacion/{id}/create', 'App\Http\Controllers\InformacionController@create')->name('auth');
Route::get('/informacion/{id}/destroy', 'App\Http\Controllers\InformacionController@destroy')->name('auth');
Route::get('/informacion/{id}/ver', 'App\Http\Controllers\InformacionController@ver')->name('auth');
Route::get('/informacion/{id}/victima-sobreviviente', 'App\Http\Controllers\InformacionController@VS')->middleware('auth');

Route::get('/seguimiento/{id}/seguimiento', 'App\Http\Controllers\SaludController@seguimiento')->middleware('auth');

Route::get ('reporte','App\Http\Controllers\ReporteController@index')->middleware('auth');
Route::post ('reporte/generar','App\Http\Controllers\ReporteController@store')->middleware('auth');
Route::post ('reporte/aplicar','App\Http\Controllers\ReporteController@aplicar')->name('auth');

Route::resource ('salud','App\Http\Controllers\SaludController')->middleware('auth');
Route::get('/salud/{id}/index','App\Http\Controllers\SaludController@index')->name('auth');
Route::get('/salud/{id}/create', 'App\Http\Controllers\SaludController@create')->name('auth');
Route::get('/salud/{id}/destroy', 'App\Http\Controllers\SaludController@destroy')->name('auth');

Route::resource ('justicia','App\Http\Controllers\JusticiaController')->middleware('auth');
Route::get('/justicia/{id}/index','App\Http\Controllers\JusticiaController@index')->name('auth');
Route::get('/justicia/{id}/create', 'App\Http\Controllers\JusticiaController@create')->name('auth');
Route::get('/justicia/{id}/destroy', 'App\Http\Controllers\JusticiaController@destroy')->name('auth');

Route::resource ('proteccion','App\Http\Controllers\ProteccionController')->middleware('auth');
Route::get('/proteccion/{id}/index','App\Http\Controllers\ProteccionController@index')->name('auth');
Route::get('/proteccion/{id}/create', 'App\Http\Controllers\ProteccionController@create')->name('auth');
Route::get('/proteccion/{id}/destroy', 'App\Http\Controllers\ProteccionController@destroy')->name('auth');


// Route::resource ('patient','App\Http\Controllers\PatientController')->middleware('auth');

// Route::resource ('specialty','App\Http\Controllers\SpecialtyController')->middleware('auth');
// Route::resource ('service','App\Http\Controllers\ServiceController')->middleware('auth');
// Route::get('/patient/{id}/index', 'App\Http\Controllers\Manejos_extintoresController@index')->middleware('patientLogued');
// Route::get('/patient/{id}/index', 'App\Http\Controllers\Manejos_extintoresController@index')->name('cliente_extintor');
// Route::post('/patient/{id}/guardar', 'App\Http\Controllers\Manejos_extintoresController@store')->name('guardarextintor');
// Route::get('patient/ocultar/{resultado_id}', 'App\Http\Controllers\Manejos_extintoresController@ocultar');
// Route::post('import/list/excel', 'App\Http\Controllers\PatientController@importExcelTest')->name('users.import.excel');
// Route::get('/change-password', 'App\Http\Controllers\PatientController@changePassword')->name('change-password');
// Route::post('/change-password', 'App\Http\Controllers\PatientController@updatePassword')->name('update-password');


require __DIR__.'/auth.php';
