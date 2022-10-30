<?php

namespace App\Http\Controllers\especialidades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\especialidades\Especialidades;
use Log;
use Webpatser\Uuid\Uuid;
use DB;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $datos =  Especialidades::all();
           /*  $datos = DB::table('especialidades')
                        ->select('id','uuid','nombre','created_at')
                        ->orderBy('nombre')
                        ->whereIn('nombre', function($q){
                            $q->select('nombre')
                              ->from('especialidades')
                              ->groupBy('nombre')
                              ->where('estado',6)
                              ->where('created_at', '>=', '2022-10-18')
                              ->where('created_at', '<=', '2022-10-20')
                              ->havingRaw('COUNT(*) > 1');
                        })->get(); */
                /* DB::table('especialidades')
                        ->select('id','uuid','nombre','created_at')
                        ->orderBy('nombre')
                        ->whereIn('nombre', function($q){
                            $q->select('nombre')
                              ->from('especialidades')
                              ->groupBy('nombre')                         
                              ->havingRaw('COUNT(*) > 1');
                        })      
                        ->where('created_at', '>=', '2022-10-18')
                        ->where('created_at', '<=', '2022-10-20')
                        ->where('estado',6)
                       ->get(); */
           /*  $q = vsprintf(str_replace(array('?'), array('\'%s\''), $datos->toSql()), $datos->getBindings());
            dd($q); */
            return response()->json(['code' => 200, 'message' => 'Registros obtenidos exitosamente', 'datos' => $datos]);
        } catch (\Exception $e) {
            Log::error('[EspecialidadesController] error in index ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
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
            $especialidad = Especialidades::create([
                'uuid' => Uuid::generate(4)->string,
                'nombre' => $request->nombre
            ]);
            return response()->json(['code' => 200, 'message' => 'Registro creado exitosamente', 'datos' =>  $especialidad]);
        } catch (\Exception $e) {
            Log::error('[EspecialidadesController] error in store ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
        }
        catch (\Exception $e) {
            Log::error('[EspecialidadesController] error in edit ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        try{
            Especialidades::where('uuid',$id)->update(['nombre' => $request->nombre]);
         

            return response()->json(['code' => 200, 'message' => 'Registro actualizado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[EspecialidadesController] error in edit ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try{
            
            Especialidades::where('uuid',$uuid)->delete();
         
            return response()->json(['code' => 200, 'message' => 'Registro eliminado exitosamente']);
        }
        catch (\Exception $e) {
            Log::error('[EspecialidadesController] error in destroy ' . $e->getMessage() . ' Linea: ' . $e->getLine());
            return response()->json(['code' => 403, 'message' => 'Ha ocurrido un error']);
        }
    }
}
