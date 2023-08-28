<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Encuesta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
class ChartController extends Controller
{
    // 

public function showChart()
{
    $userId = Auth::id(); // Obtener el ID del usuario autenticado

    $encuestas = Encuesta::all();

    $dataByEncuesta = [];

    foreach ($encuestas as $encuesta) {
        $data = DB::table('formulario')
            ->join('repuestas', 'formulario.respuesta_id', '=', 'repuestas.id')
            ->join('preguntas', 'formulario.preguntas_id', '=', 'preguntas.id')
            ->select('preguntas.Pregunta', 'repuestas.Valor')
            ->where('formulario.encuestas_id', $encuesta->id)
            ->where('formulario.user_id', $userId) // Filtrar por el ID del usuario autenticado
            ->get();

        $dataByEncuesta[$encuesta->Titulo] = $data;
    }

    return view('chart', compact('dataByEncuesta'));
}
    
}
