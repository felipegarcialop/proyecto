<?php

namespace App\Http\Controllers;
use App\Models\Apoyo;
use Illuminate\Http\Request;

class IapoyosController extends Controller
{
    public function show($id)
{
    $dato = Apoyo::findOrFail($id);

    return view('Iapoyos', ['dato' => $dato]);
}

}
