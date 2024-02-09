<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

// Route::get('/', function () {
//     return view('welcome');
   
// });

Route::get('/', [CarController::class, 'index'])->name('car.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rute za cars

//prikaz svih podataka  svi mogu da vide
// Route::get('/car', [CarController::class, 'index'])->name('car.index');


//prikaz forme za unos
Route::get('/car/create', [CarController::class, 'create'])->name('car.create')->middleware('auth');
//validacija podataka i upis novog reda u tabelu
Route::post('/car', [CarController::class, 'store'])->name('car.store')->middleware('auth');


//forma za izmenu podatka
Route::get('/car/{car}/edit', [CarController::class, 'edit'])
    ->name('car.edit')->middleware('auth');
//izvmena postojece destinacije
Route::put('/car/{car}', [CarController::class, 'update'])
    ->name('car.update')->middleware('auth');

     // //brisanje podatka
Route::delete('/car{car}', [CarController::class, 'destroy'])
->name('car.destroy')->middleware('auth');


//detaljan prikaz podatka
Route::get('/car/{car}', [CarController::class, 'show'])
->name('car.show'); 