<?php

namespace App\Http\Controllers;

use App\Models\medicos\Medicos;
use App\Models\miembros\Miembros;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::all();
        $miembros = Miembros::all();

        $datos = [
            'medicos' => $medicos,
            'miembros' => $miembros,
        ];

        $pacientes = Pacientes::all();
           
        return response()->json(['code' => 200, 'message' => 'Registros obtenidos exitosamente', 'datos' => $pacientes, 'registros' => $datos]);
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
            $datos = Pacientes::create([
                'uuid' => Uuid::generate(4)->string,
                "id_miembro" => $request->id_miembro,
                "enfermedad" => $request->enfermedad,
                "id_medico" => $request->id_medico,
                "fecha_atencion" => $request->fecha_atencion,
                "observaciones" => $request->observaciones,
                "medicamentos_recetados" => $request->medicamentos_recetados,
                "acompaniante" => $request->acompaniante,
                "telefono_acompaniante" => $request->telefono_acompaniante,
                "tipo_acompaniante" => $request->tipo_acompaniante
            ]);

            return response()->json(['code' => 200, 'message' => 'Registro creado exitosamente', 'datos' =>  $datos]);
        } catch (\Exception $e) {
            Log::error('[PacientesController] error in store ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacientes $pacientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
         try{
            Pacientes::where('uuid',$id)->update([
                "id_miembro" => $request->id_miembro,
                "enfermedad" => $request->enfermedad,
                "id_medico" => $request->id_medico,
                "fecha_atencion" => $request->fecha_atencion,
                "observaciones" => $request->observaciones,
                "medicamentos_recetados" => $request->medicamentos_recetados,
                "acompaniante" => $request->acompaniante,
                "telefono_acompaniante" => $request->telefono_acompaniante,
                "tipo_acompaniante" => $request->tipo_acompaniante
            ]);
         

            return response()->json(['code' => 200, 'message' => 'Registro actualizado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[PacientesController] error in edit ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try{
            
            Pacientes::where('uuid',$uuid)->delete();
         
            return response()->json(['code' => 200, 'message' => 'Registro eliminado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[PacientesController] error in destroy ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }
}
