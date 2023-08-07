<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
//ruta admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ruta user
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser']);
//Ruta para eliminar usuarios
Route::get('/eliminar-usuario/{id}', [App\Http\Controllers\HomeController::class, 'eliminarUsuario'])->name('eliminarUsuario'); // Ruta para eliminar un usuario

//Ruta para visualizar los datos que va modificar del usuario seleccionado
Route::get('/modificar-usuario/{id}', [App\Http\Controllers\HomeController::class, 'mostrarFormularioModificar'])->name('modificarUsuario'); // Ruta para mostrar el formulario de modificación de usuario

//Ruta para modificar los datos del usuario seleccionado
Route::put('/actualizar-usuario/{id}', [App\Http\Controllers\HomeController::class, 'actualizarUsuario'])->name('actualizarUsuario'); // Ruta para actualizar un usuario

//Ruta para consultas de usuarios
Route::get('/buscar-usuarios', [App\Http\Controllers\HomeController::class, 'buscarUsuarios'])->name('buscarUsuarios'); // Ruta para actualizar un usuario

// consumir datos json en una vista, por medio de la url
//http://127.0.0.1:8000/users/8/posts
Route::get('/users/{userId}/posts', [App\Http\Controllers\apiRestController::class, 'getUserPosts'])->name('user.posts');


