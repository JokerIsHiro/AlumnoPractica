<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\ValidateID;
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