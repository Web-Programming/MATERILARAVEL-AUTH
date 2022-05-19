<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get("/programstudi", [ProdiController::class, "index"])->name("programstudi.index");
//untuk menapilkan form tambah prodi
Route::get("/programstudi/create", [ProdiController::class, "create"])->name("programstudi.create");
//untuk menyimpan data tambah prodi
Route::post("/programstudi/store", [ProdiController::class, "store"])->name("programstudi.store");
//ke halaman detail /view detail
Route::get("/programstudi/detail/{id}", [ProdiController::class, "show"]);
//ke halaman form edit
Route::get("/programstudi/edit/{id}", [ProdiController::class, "edit"])->name("programstudi.edit");
//untuk mengupdate data edit prodi
Route::patch("/programstudi/update/{id}", [ProdiController::class, "update"])->name("programstudi.update");
