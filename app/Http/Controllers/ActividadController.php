<?php

namespace App\Http\Controllers;
use App\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades=Actividad::all();
        return $actividades;
       
     
    }

    public function store(Request $request)
    {
        $actividad = new Actividad;
        $actividad->nombre = $request->get('nombre');
        $actividad->save();
        return $actividad;
       
       
        
        
       
    }

    public function update(Request $request, $id)
    {
        $actividad= Actividad::findOrFail($id);
        $actividad->update([
            'nombre' => $request->get('nombre')
        ]);
        return $actividad;
    }

    
    public function destroy($id)
    {
        $actividad= Actividad::findOrFail($id);
        $actividad->delete();
    }
}
