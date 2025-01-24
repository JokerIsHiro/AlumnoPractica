<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Middleware\ValidateID;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("/alumnado")->controller(AlumnoController::class)->group(function(){
    Route::get("", "index");
    Route::get("/{id}", "show")->middleware(ValidateID::class);
    Route::post("", "store");
    Route::put("/{id}", "update")->middleware(ValidateID::class);
    Route::delete("/{id}", "destroy")->middleware(ValidateID::class);
});

Route::prefix("/profesor")->controller(ProfesorController::class)->group(function(){
    Route::get("", "index");
});

Route::prefix("/asignatura")->controller(AsignaturaController::class)->group(function(){
    Route::get("", "index");
});

Route::apiResource("/profesores", ProfesorController::class);
Route::get("/profesores/{id}/asignatura", [ProfesorController::class,"getAsignaturaFromProfesor"]);
Route::get("/profesores/{id}/alumno", [ProfesorController::class,"getAlumnosFromProfesor"]);

Route::apiResource("/profesores", ProfesorController::class);
Route::get("/profesores/{id}/asignatura", [ProfesorController::class,"getAsignaturaFromProfesor"]);
Route::get("/profesores/{id}/alumno", [ProfesorController::class,"getAlumnosFromProfesor"]);