<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = DB::table('proyectos')->get();
        return view('proyects.index', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyects.new'); // Carga la vista donde está el formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proyectos::create($request->all()); // Arreglado el nombre del modelo
        return redirect('proyectos')->with('success', 'Proyecto creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyectos=Proyectos::find($id);
        return view('proyects.update', compact('proyectos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => "required|max:255",
            'descripcion' => "required"
        ]);
    
        // Actualizar el proyecto
        $proyectos=Proyectos::find($id);
        $proyectos->update($request->all());
    
        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado satisfactoriamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Proyectos $proyectos)
    // {
    //     $proyecto->delete();
    //     return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado satisfactoriamente');
    // }
    public function destroy($id)
    {
        $proyecto=Proyectos::find($id);
        $proyecto->delete();
        return redirect('proyectos')->with('success', 'Proyecto eliminado satisfactoriamente');
    }
}
