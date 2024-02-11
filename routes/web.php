<?php
use App\Http\Controllers\AbsensirController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\KelaserController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswarController;
use App\Http\Controllers\UserController;
use App\Models\Absensir;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login'])->name('login');    
});

Route::get('/home', function(){
    return redirect('/beranda');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/beranda', [SesiController::class, 'beranda']);
    Route::get('/logout',  [SesiController::class, 'logout']);

    Route::resource('/user', UserController::class)->middleware('level:admin');
    Route::resource('/kelaser', KelaserController::class)->middleware('level:admin');
    Route::resource('/siswar', SiswarController::class)->middleware('level:admin');
 
    Route::resource('/absensir', AbsensirController::class);
    Route::post('/filterByKelas', [FilterController::class, 'filterByKelas']);
    Route::post('/PilihKelas', [FilterController::class, 'PilihKelas']);
    Route::post('/FilterRekap',[FilterController::class, 'FilterRekap']);

    Route::middleware(['auth', 'level:admin,guru'])->group(function(){ 
        Route::get('/AbsenKelas',[AbsensirController::class,'AbsenKelas']);
        Route::get('/absensir/create',[AbsensirController::class,'create']);
    });
});