<?php

namespace App\Http\Controllers;

use App\eva_tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tareas = eva_tareas::all();
        return view('tareas.index',compact('tareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $data = request()->validate([
            "tareaDescripcion" => 'required|max:200',
            "tareaFechaLimite" => 'required'
        ]);

        eva_tareas::query()->insert([
            "tareaFechaLimite"=>$request->tareaFechaLimite, 
            "tareaDescripcion"=>$request->tareaDescripcion, 
            "tareaEstado"=>"Solicitada"
        ]);

        return redirect()->route('tareas.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eva_tareas $tarea)
    {
        eva_tareas::query()->whereId($tarea->id)->update($request->only('tareaEstado'));
        return redirect()->route('tareas.index');
    }
}
