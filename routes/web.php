<?php

use App\Http\Controllers\GuiaController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AprendizController;
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
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('guias', GuiaController::class)->names('guias');
    
    Route::get('/guias/{id}/aprendices', [GuiaController::class, 'getAprendices']);

    Route::middleware(['role:instructor'])->group(function(){
        
        Route::resource('instructor', InstructorController::class)->names('instructor');
       
        
    });
    Route::middleware(['role:aprendiz'])->group(function(){
        
        Route::resource('aprendices', AprendizController::class)->names('aprendices');
        
    });
    
});

