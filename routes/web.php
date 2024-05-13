<?php

use App\Http\Controllers\CircuitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CircuitController::class, 'index']);
Route::post('circuit/store', [CircuitController::class, 'post'])->name('circuit.post');
Route::post('circuit/path_post', [CircuitController::class, 'path_post'])->name('circuit.path_post');
Route::post('circuit/buildign_post', [CircuitController::class, 'buildign_post'])->name('circuit.buildign_post');
