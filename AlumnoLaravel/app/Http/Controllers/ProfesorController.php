<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function getAlumnosFromProfesor(Request $request,$id){
        return Profesor::find($id)->alumnos;
    }

    public function getAsignaturaFromProfesor (Request $request,$id){
        return Profesor::find($id)->asignatura;
    }

    public function index()
    {
        try {
            $profesores = DB::table("profesor")->get();

            if ($profesores->isEmpty()) {
                throw new \Exception("No se han encontrado alumnos");
            }
            return $this->sendResponse(true, "Obtención de alumnos correcta", $profesores, 200);
        }catch(\Exception $e){
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }
}
