<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use Illuminate\Http\Request;
use App\Models\TabelaUser;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/formulario', [FormularioController::class, 'create']);

Route::post('/formulario', [FormularioController::class, 'store']);

// Route::get('/usuarios', [FormularioController::class, 'index']);

Route::get('/usuarios', [FormularioController::class, 'index']);

// Route::get('/usuarios',['as' => 'usuarios-cadastrados' => 'App\Http\Controllers\FormularioController@index']);

Route::get('/usuarios/{id}', [FormularioController::class, 'edit'])->name('users.edicao');

Route::post('/usuarios/update/{id}', [FormularioController::class, 'update']);

Route::get('/usuarios/delete/{id}', [FormularioController::class, 'destroy'])->name('usuarios.destroy');

//Route::get('/usuarios', [TabelaUser::class, 'index'])->name('usuarios.index');

// Route::get('/buscar-usuario/{id_do_usuario}', function($id_do_usuario){
//     TabelaUser::findOrFail($id_do_usuario);
// });

// ->name('formulario.store')