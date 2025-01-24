<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AsignaturaController extends Controller
{
    public function index()
    {
        try {
            $asignaturas = DB::table("asignatura")->get();

            if ($asignaturas->isEmpty()) {
                throw new \Exception("No se han encontrado asignaturas");
            }
            return $this->sendResponse(true, "Obtención de asignaturas correcta", $asignaturas, 200);
        }catch(\Exception $e){
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }
}
