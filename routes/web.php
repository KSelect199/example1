<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\SimCardEditController::class, 'index'])->name('simCard.index');
Route::get('/simcard', [Controllers\SimCardEditController::class, 'index']);

Route::get('/simcard/create', [Controllers\SimCardEditController::class, 'create']);
Route::post('/simcard', [Controllers\SimCardEditController::class, 'store'])->name('simCard.store');
Route::get('/simcard/{simCard}', [Controllers\SimCardEditController::class, 'show'])->name('simCard.show');
Route::get('/simcard/{simCard}/edit', [Controllers\SimCardEditController::class, 'edit'])->name('simCard.edit');
Route::patch('/simcard/{simCard}', [Controllers\SimCardEditController::class, 'update'])->name('simCard.update');
Route::delete('/simcard/{simCard}', [Controllers\SimCardEditController::class, 'destroy'])->name('simCard.delete');

// Route::get('/simcard/update', [Controllers\SimCardEditController::class, 'update']);
// Route::get('/simcard/delete', [Controllers\SimCardEditController::class, 'delete']);
// Route::get('/simcard/first_or_create', [Controllers\SimCardEditController::class, 'firstOrCreate']);
// Route::get('/simcard/update_or_create', [Controllers\SimCardEditController::class, 'updateOrCreate']);
