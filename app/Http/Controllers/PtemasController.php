<?php

namespace App\Http\Controllers;
use App\Models\Tema;
use Illuminate\Http\Request;

class PtemasController extends Controller
{
    //
    public function index()
{
    $datos = Tema::select('id', 'Nombre','Descripcion','Fecha')->get();

    return view('PTemas', ['datos' => $datos]);
}

}
