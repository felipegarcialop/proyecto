<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Encuesta;
use App\Models\Alumno;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    // Mostrar gráficos por encuesta
    public function showChart()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        $encuestas = Encuesta::all();

        $dataByEncuesta = [];

        foreach ($encuestas as $encuesta) {
            $data = DB::table('formulario')
                ->join('repuestas', 'formulario.respuesta_id', '=', 'repuestas.id')
                ->join('preguntas', 'formulario.preguntas_id', '=', 'preguntas.id')
                ->select('preguntas.pregunta', 'repuestas.Valor', DB::raw('ROW_NUMBER() OVER (ORDER BY preguntas.id) as question_number'))
                ->where('formulario.encuestas_id', $encuesta->id)
                ->where('formulario.user_id', $userId)
                ->get();
        
            $totalScore = $data->sum('Valor');
            $totalQuestions = $data->count();
        
            if ($totalQuestions !== 0) {
                $adjustedAverage = ($totalScore / ($totalQuestions * 100)) * 100;
            } else {
                $adjustedAverage = 0;
            }
        
            $dataByEncuesta[$encuesta->Titulo] = [
                'data' => $data,
                'totalScore' => $totalScore,
                'totalQuestions' => $totalQuestions,
                'adjustedAverage' => $adjustedAverage,
            ];
        }
        
        return view('chart', compact('dataByEncuesta'));
    }

   // Mostrar puntajes específicos para un alumno
public function showPuntajes($user_id)
{
    $encuestas = Encuesta::all();

    $dataByEncuesta = [];

    foreach ($encuestas as $encuesta) {
        $data = DB::table('formulario')
            ->join('repuestas', 'formulario.respuesta_id', '=', 'repuestas.id')
            ->join('preguntas', 'formulario.preguntas_id', '=', 'preguntas.id')
            ->select('preguntas.pregunta', 'repuestas.Valor', DB::raw('ROW_NUMBER() OVER (ORDER BY preguntas.id) as question_number'))
            ->where('formulario.encuestas_id', $encuesta->id)
            ->where('formulario.user_id', $user_id)
            ->get();

        $totalScore = $data->sum('Valor');
        $totalQuestions = $data->count();

        if ($totalQuestions !== 0) {
            $adjustedAverage = ($totalScore / ($totalQuestions * 100)) * 100;
        } else {
            $adjustedAverage = 0;
        }

        $dataByEncuesta[$encuesta->Titulo] = [
            'data' => $data,
            'totalScore' => $totalScore,
            'totalQuestions' => $totalQuestions,
            'adjustedAverage' => $adjustedAverage,
        ];
    }

    $alumno = Alumno::where('user_id', $user_id)->first();
    $user = $alumno ? $alumno->user : null;

    return view('seguimiento.puntajes', [
        'dataByEncuesta' => $dataByEncuesta,
        'user' => $user // Pasar el usuario a la vista
    ]);
}

}
