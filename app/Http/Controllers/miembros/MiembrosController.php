<?php

namespace App\Http\Controllers\miembros;

use App\Models\miembros\Miembros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TiposSangre;
use App\Models\Generos;
use App\Models\EstadosCivil;
use Log;
use Webpatser\Uuid\Uuid;
class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Generos::all();
        $estadosCivil = EstadosCivil::all();
        $tiposSangre  = TiposSangre::all();

        $datos = [
            'generos' => $generos,
            'estadosCivil' => $estadosCivil,
            'tiposSangre' => $tiposSangre
        ];

        $miembros = Miembros::all();
           
        return response()->json(['code' => 200, 'message' => 'Registros obtenidos exitosamente', 'datos' => $miembros, 'registros' => $datos]);
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
            $datos = Miembros::create([
                'uuid' => Uuid::generate(4)->string,
                'cui' => $request->cui, 
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'encargado' => $request->encargado, 
                'direccion' => $request->direccion, 
                'telefono' => $request->telefono,
                'enfermedades' => $request->enfermedades,
                'id_tipo_sangre' => $request->id_tipo_sangre,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'id_genero' => $request->id_genero,
                'id_estado_civil' => $request->id_estado_civil,
            ]);

            return response()->json(['code' => 200, 'message' => 'Registro creado exitosamente', 'datos' =>  $datos]);
        } catch (\Exception $e) {
            Log::error('[MiembrosController] error in store ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function show(Miembros $miembros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function edit(Miembros $miembros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{
            Miembros::where('uuid',$id)->update([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'salario' => $request->salario,
                'direccion' => $request->direccion,
                'id_especialidad' => $request->id_especialidad,
            ]);
         

            return response()->json(['code' => 200, 'message' => 'Registro actualizado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[MiembrosController] error in edit ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try{
            
            Miembros::where('uuid',$uuid)->delete();
         
            return response()->json(['code' => 200, 'message' => 'Registro eliminado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[MiembrosController] error in destroy ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }
}
