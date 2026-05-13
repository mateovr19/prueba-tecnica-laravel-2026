<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseBasicsController;
use App\Http\Controllers\ExerciseIntermediateController;

Route::prefix('v1')->group(function () {
    Route::prefix('/mascotas')->controller(ExerciseBasicsController::class)->group(function () {
        Route::get('', 'getAllPets');
        Route::post('', 'save');
        Route::get('/{id}', 'getPet');
        Route::put('/{id}', 'updatePet');
        Route::delete('/{id}', 'deletePet');
    });

    Route::prefix('consultas')->controller(ExerciseIntermediateController::class)->group(function () {
        Route::get('',  'index');
        Route::post('',  'store');
        Route::get('/{consulta}', 'show');
        Route::put('/{consulta}',  'update');
        Route::delete('/{consulta}', 'destroy');
    });
});
