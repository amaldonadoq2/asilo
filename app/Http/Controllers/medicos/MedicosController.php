<?php

namespace App\Http\Controllers\medicos;

use App\Http\Controllers\Controller;
use App\Models\especialidades\Especialidades;
use App\Models\medicos\Medicos;
use Illuminate\Http\Request;
use Log;
use Webpatser\Uuid\Uuid;
class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos =  Medicos::all();
        $especialidades = Especialidades::all();
           
        return response()->json(['code' => 200, 'message' => 'Registros obtenidos exitosamente', 'datos' => $datos, 'especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $especialidad = Medicos::create([
                'uuid' => Uuid::generate(4)->string,
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'salario' => $request->salario,
                'direccion' => $request->direccion,
                'id_especialidad' => $request->id_especialidad,
            ]);

            return response()->json(['code' => 200, 'message' => 'Registro creado exitosamente', 'datos' =>  $especialidad]);
        } catch (\Exception $e) {
            Log::error('[MedicosController] error in store ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicos $medicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            Medicos::where('uuid',$id)->update([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'salario' => $request->salario,
                'direccion' => $request->direccion,
                'id_especialidad' => $request->id_especialidad,
            ]);
         

            return response()->json(['code' => 200, 'message' => 'Registro actualizado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[MedicosController] error in edit ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try{
            
            Medicos::where('uuid',$uuid)->delete();
         
            return response()->json(['code' => 200, 'message' => 'Registro eliminado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[MedicosController] error in destroy ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }
}
