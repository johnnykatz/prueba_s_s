<?php

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('admin/empresas', ['as' => 'admin.empresas.index', 'uses' => 'Admin\EmpresaController@index', 'middleware' => ['auth']]);
Route::post('admin/empresas', ['as' => 'admin.empresas.store', 'uses' => 'Admin\EmpresaController@store', 'middleware' => ['auth']]);
Route::get('admin/empresas/create', ['as' => 'admin.empresas.create', 'uses' => 'Admin\EmpresaController@create', 'middleware' => ['auth']]);
Route::put('admin/empresas/{empresas}', ['as' => 'admin.empresas.update', 'uses' => 'Admin\EmpresaController@update', 'middleware' => ['auth']]);
Route::patch('admin/empresas/{empresas}', ['as' => 'admin.empresas.update', 'uses' => 'Admin\EmpresaController@update', 'middleware' => ['auth']]);
Route::delete('admin/empresas/{empresas}', ['as' => 'admin.empresas.destroy', 'uses' => 'Admin\EmpresaController@destroy', 'middleware' => ['auth']]);
Route::get('admin/empresas/{empresas}', ['as' => 'admin.empresas.show', 'uses' => 'Admin\EmpresaController@show', 'middleware' => ['auth']]);
Route::get('admin/empresas/{empresas}/edit', ['as' => 'admin.empresas.edit', 'uses' => 'Admin\EmpresaController@edit', 'middleware' => ['auth']]);


Route::get('admin/empleados', ['as' => 'admin.empleados.index', 'uses' => 'Admin\EmpleadoController@index', 'middleware' => ['auth']]);
Route::post('admin/empleados', ['as' => 'admin.empleados.store', 'uses' => 'Admin\EmpleadoController@store', 'middleware' => ['auth']]);
Route::get('admin/empleados/create', ['as' => 'admin.empleados.create', 'uses' => 'Admin\EmpleadoController@create', 'middleware' => ['auth']]);
Route::put('admin/empleados/{empleados}', ['as' => 'admin.empleados.update', 'uses' => 'Admin\EmpleadoController@update', 'middleware' => ['auth']]);
Route::patch('admin/empleados/{empleados}', ['as' => 'admin.empleados.update', 'uses' => 'Admin\EmpleadoController@update', 'middleware' => ['auth']]);
Route::delete('admin/empleados/{empleados}', ['as' => 'admin.empleados.destroy', 'uses' => 'Admin\EmpleadoController@destroy', 'middleware' => ['auth']]);
Route::get('admin/empleados/{empleados}', ['as' => 'admin.empleados.show', 'uses' => 'Admin\EmpleadoController@show', 'middleware' => ['auth']]);
Route::get('admin/empleados/{empleados}/edit', ['as' => 'admin.empleados.edit', 'uses' => 'Admin\EmpleadoController@edit', 'middleware' => ['auth']]);
