<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImagenController;
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

Route::get('/lista', function () {
    return view('lista');
});

Route::get('/datos', function () {
    return view('datos');
});

//Se manda la clase controladora y el metodo que se quiere usar, ya no se usa el anterior closure  
//Route::get('/datos', function () {
//   return view('datos');
//}); 
// para -> name (nombre de ruta), si se modifica el nombre de los metodos /register  ya no se tiene que ir
//a todas las vistas para cambiiar el nombre, automaticamente lo hace con el name-> 

Route::get('/register', [RegisterController::class,'index']) ->name('register');
Route::post('/register', [RegisterController::class,'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login'); 
//Inicio de sesion, store para almacenar informacion
Route::post('/login', [LoginController::class, 'store']); 
//Cerrar sesion modo seguro 
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

//{} convierte una variable route model,
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');

//Crear la reseña
Route::get('/reviews/create',[PostController::class,'create'])->name('reviews.create');
/// PARA imagenes
Route::post('/review',[PostController::class,'store'])->name('review.store');

Route::post('/userimagen',[ImagenController::class,'store'])->name('userimagen.store');

Route::get('/{user:username}/reviews/{review}',[PostController::class,'show'])->name('review.show');

Route::post('/{user:username}/reviews/{review}',[ComentarioController::class,'store'])->name('comentarios.store');

Route::delete('/review/{review}',[PostController::class,'destroy'])->name('review.destroy');


