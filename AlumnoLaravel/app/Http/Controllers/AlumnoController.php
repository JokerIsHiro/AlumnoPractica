<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class AlumnoController extends Controller
{
    public function index()
    {
        try {
            $alumnos = DB::table("alumno")->get();

            if ($alumnos->isEmpty()) {
                throw new \Exception("No se han encontrado alumnos");
            }
            return $this->sendResponse(true, "Obtención de alumnos correcta", $alumnos, 200);
        }catch(\Exception $e){
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validate = $request->validate([
                "name" => "required|string|max:32",
                "phone" => "nullable|string|max:16",
                "age" => "nullable|integer",
                "passwd" => "required|string|max:64",
                "email" => "required|string|email|max:64|unique:alumno",
                "gender" => "required|string",
            ]);
            $id = DB::table("alumno")->insertGetId($validate);
            $alumno = DB::table("alumno")->find($id);
            return $this->sendResponse(true, "Alumno creado correctamente", $alumno, 201);
        } catch (ValidationException $e) {
            return $this->sendResponse(false, "Los datos introducidos no son válidos", $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        try{
            $alumno = DB::table("alumno")->find($id);

            if(!$alumno){
                throw new \Exception("Alumno no encontrado");
            }
            return $this->sendResponse(true, "Devolviendo Alumno con el id: ".$id, $alumno, 200);
        }catch(\Exception $e){
            return $this->sendResponse(false, "Ha ocurrido un error: ".$e->getMessage(), null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validate = $request->validate([
                "name" => "required|string|max:255",
                "phone" => "nullable|string|max:16",
                "age" => "nullable|integer",
                "passwd" => "nullable|string|min:6",
                "email" => "required|string|email|max:255|unique:alumno,email," . $id,
                "gender" => "required|string|max:1",
            ]);
            $update = DB::table("alumno")->where("id", $id)->update($validate);

            if($update === 0){
                return $this->sendResponse(false, "Alumno no encontrado o no se han realizado cambios en el Alumno", null, 404);
            }
            $alumno = DB::table("alumno")->find($id);

            return $this->sendResponse(true, "Alumno actualizado con éxito", $alumno, 200);
        }catch(ValidationException $e){
            return $this->sendResponse(false, "Los datos introducidos no son válidos", $e->getMessage(), 422);
        }catch(ModelNotFoundException $e){
            return $this->sendResponse(false, "No se ha encontrado el Alumno", $e->getMessage(), 404);
        }catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $delete = DB::table("alumno")->where("id", $id)->delete();

            if ($delete === 0) {
                return $this->sendResponse(false, "Alumno no encontrado", null, 404);
            }

            return $this->sendResponse(true, "Alumno eliminado con éxito", null, 200);
        } catch (ModelNotFoundException $e) {
            return $this->sendResponse(false, "No se ha encontrado el Alumno", $e->getMessage(), 404);
        } catch (\Exception $e) {
            return $this->sendResponse(false, "Error inesperado", $e->getMessage(), 500);
        }
    }
}