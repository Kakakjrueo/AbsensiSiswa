<?php
use App\Http\Controllers\AbsensirController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\KelaserController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login'])->name('login');    
});

Route::get('/home', function(){
    return redirect('/beranda');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/beranda', [HakAksesController::class, 'index']);
    Route::get('/logout',  [SesiController::class, 'logout']);

    Route::resource('/user', UserController::class)->middleware('level:admin');
    Route::resource('/kelaser', KelaserController::class)->middleware('level:admin');
    Route::resource('/siswar', SiswarController::class)->middleware('level:admin');
 
    Route::resource('/absensir', AbsensirController::class);
    Route::post('/filter',[SecondController::class,'filter']);
    Route::post('/filterByKelas', [FilterController::class, 'filterByKelas']);
    Route::post('/PilihKelas', [FilterController::class, 'PilihKelas']);
    Route::post('/OrderById', [FilterController::class, 'OrderById']);

    Route::middleware(['auth', 'level:admin,guru'])->group(function(){ 
        Route::get('/AbsenKelas',[SecondController::class,'AbsenKelas']);
    });
});