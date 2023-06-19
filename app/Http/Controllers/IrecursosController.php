<?php

namespace App\Http\Controllers;
use App\Models\Recuso;
use Illuminate\Http\Request;

class IrecursosController extends Controller
{
    //
    public function show($id)
    {
        $dato = Recuso::findOrFail($id);
    
        return view('Irecursos', ['dato' => $dato]);
    }
}
