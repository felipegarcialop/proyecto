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
            ->select('preguntas.id', 'repuestas.Valor', DB::raw('ROW_NUMBER() OVER (ORDER BY preguntas.id) as question_number'))
            ->where('formulario.encuestas_id', $encuesta->id)
            ->where('formulario.user_id', $userId) // Filtrar por el ID del usuario autenticado
            ->get();
    
        $totalScore = $data->sum('Valor'); // Calcular la puntuación total
        $totalQuestions = $data->count(); // Contar el número de preguntas
    
        if ($totalQuestions !== 0) {
            $adjustedAverage = ($totalScore / ($totalQuestions * 100)) * 100; // Calcular el promedio ajustado
        } else {
            $adjustedAverage = 0; // Establecer el promedio ajustado como cero si no hay preguntas
        }
    
        $dataByEncuesta[$encuesta->Titulo] = [
            'data' => $data,
            'totalScore' => $totalScore,
            'totalQuestions' => $totalQuestions, // Pasar el total de preguntas a la vista
            'adjustedAverage' => $adjustedAverage, // Pasar el promedio ajustado a la vista
        ];
    }
    

    return view('chart', compact('dataByEncuesta'));
}


}
