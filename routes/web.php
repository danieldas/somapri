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
Route::group(['middleware' => 'noautenticado'], function () {
    Route::get('/', 'App\Http\Controllers\UsuarioController@login')->name('usuarios.login');
    Route::post('logear', 'App\Http\Controllers\UsuarioController@logear')->name('usuarios.logear');
});
Route::group(['middleware' => ['autenticado']], function () {
    Route::get('home', 'App\Http\Controllers\UsuarioController@home')->name('plantillas.principal');
    Route::get('logout', 'App\Http\Controllers\UsuarioController@logout')->name('usuarios.logout');

    Route::resource('clientes', 'App\Http\Controllers\ClienteController', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update']]);

    Route::resource('productos', 'App\Http\Controllers\ProductoController', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update']]);

    Route::resource('compras', 'App\Http\Controllers\CompraController', ['only' => ['store', 'destroy']]);
    Route::get('compras/lista/{id}', 'App\Http\Controllers\CompraController@lista')->name('compras.lista');
    Route::resource('ventas', 'App\Http\Controllers\VentaController', ['only' => ['store', 'destroy', 'index']]);
    Route::get('calcular-precio/{idProducto}/{esFacturado}/{cantidad}', 'App\Http\Controllers\VentaController@calcularPrecio');

});

Route::group(['middleware' => [ 'autenticado' , 'administrador']], function(){
    Route::get('usuarios/{id}/{estado}/cambiarEstado', 'App\Http\Controllers\UsuarioController@cambiarEstado')->name('usuarios.cambiarEstado');
    Route::post('usuarios/cambiarPass', 'App\Http\Controllers\UsuarioController@cambiarPass')->name('usuarios.cambiarPass');

    Route::resource('usuarios', 'App\Http\Controllers\UsuarioController', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update']]);

});
