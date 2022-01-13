<?php

use App\Http\Controllers\IngresoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TanqueController;
use App\Http\Controllers\TrasvaseController;
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
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('dashboard/orden', [OrdenController::class, 'index'])->name('orden.index');
Route::get('dashboard/orden/registrar', [OrdenController::class, 'create'])->name('orden.registrar');
Route::post('dashboard/orden/store', [OrdenController::class, 'store'])->name('orden.store');

Route::get('dashboard/ingreso', [IngresoController::class, 'index'])->name('ingreso.index');
Route::get('dashboard/ingreso/registrar', [IngresoController::class, 'create'])->name('ingreso.registrar');
Route::post('dashboard/ingreso/store', [IngresoController::class, 'store'])->name('ingreso.store');

Route::get('dashboard/trasvase', [TrasvaseController::class, 'index'])->name('trasvase.index');
Route::get('dashboard/trasvase/productos', [TrasvaseController::class, 'producto'])->name('trasvase.productos');
Route::get('dashboard/trasvase/create', [TrasvaseController::class, 'create'])->name('trasvase.registrar');
Route::post('dashboard/trasvase/store', [TrasvaseController::class, 'store'])->name('trasvase.store');


Route::get('dashboard/tanque', [TanqueController::class, 'index'])->name('tanque.index');
Route::get('dashboard/tanque/seguimiento', [TanqueController::class, 'seguimiento'])->name('tanque.seguimiento');
Route::get('dashboard/tanque/registrar', [TanqueController::class, 'index'])->name('tanque.registrar');
Route::get('dashboard/tanque/detalle/{id}', [TanqueController::class, 'detalle'])->name('tanque.detalle');
Route::post('dashboard/tanque/actualizar', [TanqueController::class, 'actualizar'])->name('tanque.actualizar');
Route::get('dashboard/tanque/qr/{id}', [TanqueController::class, 'generarQr'])->name('tanque.qr');


Route::get('dashboard/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('dashboard/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('dashboard/producto/store', [ProductoController::class, 'store'])->name('producto.store');
Route::post('dashboard/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
