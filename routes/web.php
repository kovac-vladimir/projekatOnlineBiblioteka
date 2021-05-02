<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\FormatController;


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

Route::get('/pismo',[PismoController::class,'index'])->name('pismo.index');
Route::get("/pismo/{id}",[PismoController::class,'show'])->name('pismo.edit');
Route::post("/pismo-update",[PismoController::class,'update'])->name('pismo.update');
Route::get("/pismo/delete/{id}",[PismoController::class,'destroy'])->name('pismo.delete');
Route::get("/addPismo",[PismoController::class,'addPismo'])->name('pismo.add');
Route::post("/savePismo",[PismoController::class,'savePismo'])->name('pismo.save');

Route::get('/povez',[PovezController::class,'index'])->name('povez.index');
Route::get('/povez/{id}',[PovezController::class,'show'])->name('povez.edit');
Route::post('/povez-update',[PovezController::class,'update'])->name('povez.update');
Route::get('/addPovez',[PovezController::class,'addPovez'])->name('povez.create');
Route::post('/addPovez',[PovezController::class,'savePovez'])->name('povez.save');
Route::get("/povez/delete/{id}",[PovezController::class,'destroy'])->name('povez.delete');

Route::get('/format',[FormatController::class,'index'])->name('format.index');
Route::get('/format/{id}',[FormatController::class,'show'])->name('format.edit');
Route::post('/format-update',[FormatController::class,'update'])->name('format.update');
Route::get('/addFromat',[FormatController::class,'addFormat'])->name('format.create');
Route::post('/addFormat',[FormatController::class,'saveFormat'])->name('format.save');
Route::get("/format/delete/{id}",[FormatController::class,'destroy'])->name('format.delete');