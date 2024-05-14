<?php

use App\Http\Controllers\CircuitController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

Route::get('/', [CircuitController::class, 'index']);
Route::get('map', [MapController::class, 'showMap']);
Route::post('circuit/store', [CircuitController::class, 'post'])->name('circuit.post');
Route::post('circuit/path_post', [CircuitController::class, 'path_post'])->name('circuit.path_post');
Route::post('circuit/buildign_post', [CircuitController::class, 'buildign_post'])->name('circuit.buildign_post');
