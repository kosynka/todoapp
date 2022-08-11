<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/', [TaskController::class, 'index'])->name('index');

Route::post('/', [TaskController::class, 'store'])->name('store');

Route::get('/edit/{task:id}', [TaskController::class, 'edit'])->name('edit');

Route::put('/edit/{task:id}', [TaskController::class, 'update'])->name('update');

Route::delete('/{task:id}', [TaskController::class, 'destroy'])->name('destroy');