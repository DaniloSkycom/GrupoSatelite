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
    return view('welcome');
});

Route::group(["middleware" => ["auth"]], function(){

    Route::get("/dashboard", "DashboardController@index")->name("dashboard");

    Route::group(['prefix' => 'Materia'], function() {
        
        Route::get('all', 'MateriaController@index');
        Route::post('action', 'MateriaController@action');
        Route::post('destroy', 'MateriaController@eliminar');

    });

    Route::group(['prefix' => 'Grado'], function() {
        
        Route::get('all', 'GradoController@index');
        Route::post('action', 'GradoController@action');
        Route::post('destroy', 'GradoController@eliminar');

    });

    Route::group(['prefix' => 'Alumno'], function() {
        
        Route::get('all', 'AlumnoController@index');
        Route::post('action', 'AlumnoController@action');
        Route::post('destroy', 'AlumnoController@eliminar');
        Route::post('findReport', 'AlumnoController@findReport');
        Route::get('report', 'AlumnoController@report');

    });

    Route::group(['prefix' => 'MateriaGrado'], function() {
        
        Route::get('all', 'MateriaGradoController@index');
        Route::post('action', 'MateriaGradoController@action');
        Route::post('destroy', 'MateriaGradoController@eliminar');

    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
