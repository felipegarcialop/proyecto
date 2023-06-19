<?php

namespace App\Http\Controllers;
use App\Models\Apoyo;
use Illuminate\Http\Request;

class PapoyosController extends Controller
{
    public function index()
{
    $datos = Apoyo::select('id', 'Nombre' ,'Descripcion' ,'Direccion' ,'Telefono' ,'Correo')->get();

    return view('Papoyos', ['datos' => $datos]);
}

}
