<?php

namespace App\Http\Controllers;

use App\eva_tareas;
use Illuminate\Http\Request;;

class DiagramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tareas = eva_tareas::all();
        return view('diagrama.index',compact('tareas'));
    }
}
