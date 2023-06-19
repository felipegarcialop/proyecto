<?php

namespace App\Http\Controllers;
use App\Models\Tema;
use Illuminate\Http\Request;

class ItemasController extends Controller
{
    //
    public function show($id)
{
    $dato = Tema::findOrFail($id);

    return view('Itemas', ['dato' => $dato]);
}

}
