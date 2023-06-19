<?php

namespace App\Http\Controllers;
use App\Models\Recuso;
use Illuminate\Http\Request;

class PrecursosController extends Controller
{
    //
    public function index()
    {
        $datos = Recuso::select('id', 'nombre' ,'objetivo' ,'descipcion')->get();
    
        return view('Precursos', ['datos' => $datos]);
    }
}
