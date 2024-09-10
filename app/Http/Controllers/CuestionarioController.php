<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Repuesta;
use App\Models\Pregunta;
use App\Models\Tema;
use App\Models\Encuesta;
use App\Models\User;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class CuestionarioController
 * @package App\Http\Controllers
 */
class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarCuestionarios($id)
{
    $encuestaId = $id;

    // Obtén la información de la encuesta, incluyendo su título
    $encuesta = Encuesta::find($encuestaId);

    // Verifica si la encuesta existe
    if (!$encuesta) {
        return redirect()->route('PTemas')->with('error', 'No existe encuesta.');
    }

    // Agrupamos cuestionarios por pregunta_id
    $cuestionariosGrouped = Cuestionario::with(['pregunta', 'repuesta'])
        ->whereHas('pregunta.encuesta', function ($query) use ($encuestaId) {
            $query->where('id', $encuestaId);
        })
        ->get()
        ->groupBy('pregunta_id'); // Agrupar por pregunta_id

    if ($cuestionariosGrouped->isEmpty()) {
        return view('cuestionarios', [
            'encuesta' => $encuesta,
            'cuestionarios' => collect(),
            'respuestasPorPregunta' => [],
            'id' => $id,
            'con' => (object) ['con' => 0], // Definir un valor por defecto
            'error' => 'No existen cuestionarios para esta encuesta.'
        ]);
    }

    $cuestionarios = collect();
    foreach ($cuestionariosGrouped as $preguntaId => $group) {
        $cuestionarios->put($preguntaId, $group->first());
    }

    $respuestasPorPregunta = [];
    foreach ($cuestionarios as $preguntaId => $cuestionario) {
        $respuestas = DB::table('encuestas')
            ->join('preguntas', 'preguntas.encuesta_id', '=', 'encuestas.id')
            ->join('cuestionarios', 'cuestionarios.pregunta_id', '=', 'preguntas.id')
            ->join('repuestas', 'cuestionarios.repuesta_id', '=', 'repuestas.id')
            ->where('cuestionarios.pregunta_id', $preguntaId)
            ->where('encuestas.id', $encuestaId)
            ->select('repuestas.id', 'repuestas.Respuestas') // Agregamos el campo 'id' de respuestas
            ->get();

        $respuestasPorPregunta[$preguntaId] = $respuestas;
    }

    // Contar las preguntas
    $con = DB::table('preguntas')->where('encuesta_id', $id)->count();

    return view('cuestionarios', compact('cuestionarios', 'respuestasPorPregunta', 'id', 'con', 'encuesta'));
}

    
    
    

    public function index()
    {
        $cuestionarios = Cuestionario::paginate();

        return view('cuestionario.index', compact('cuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $cuestionarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuestionario = new Cuestionario();
        $pregunta= Pregunta::pluck('pregunta','id');
        $respuestas =Repuesta::pluck('Respuestas','id');
        $res =Repuesta::all();
        return view('cuestionario.create', compact('cuestionario','pregunta','respuestas','res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cuestionario::$rules);
    
        $pregunta_id = $request->input('pregunta_id');
        $respuestas = $request->input('repuesta_id');
    
        try {
            foreach ($respuestas as $respuesta) {
                // Crear un nuevo registro para cada respuesta seleccionada
                Cuestionario::create([
                    'pregunta_id' => $pregunta_id,
                    'repuesta_id' => $respuesta,
                ]);
            }
    
            return redirect()->route('cuestionarios.index')
                ->with('success', 'La pregunta y sus respuestas se agregaron correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error while saving cuestionario: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuestionario = Cuestionario::find($id);

        return view('cuestionario.show', compact('cuestionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuestionario = Cuestionario::find($id);
       

        return view('cuestionario.edit', compact('cuestionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cuestionario $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuestionario $cuestionario)
    {
        request()->validate(Cuestionario::$rules);

        $cuestionario->update($request->all());

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuestionario = Cuestionario::find($id)->delete();

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario eliminado correctamente');
    }
    public function guardarCuestionarios(Request $request)
{
    $encuestaId = $request->input('id');
    $userId = auth()->user()->id; // ID del usuario autenticado

    // Verificar si el usuario ya realizó la encuesta
    $encuestaRealizada = DB::table('formulario')
        ->where('encuestas_id', $encuestaId)
        ->where('user_id', $userId)
        ->exists();

    if ($encuestaRealizada) {
        return redirect()->route('home');
    }

    foreach ($request->all() as $name => $value) {
        if (strpos($name, 'respuesta_') === 0) {
            $preguntaId = substr($name, strlen('respuesta_'));
            $respuestaId = $value;

            // Insertar los datos directamente en la tabla "formulario"
            DB::table('formulario')->insert([
                'encuestas_id' => $encuestaId,
                'preguntas_id' => $preguntaId,
                'respuesta_id' => $respuestaId,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    return view('home');
}

    
   
}

