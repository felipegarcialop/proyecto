<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Repuesta;
use App\Models\Pregunta;
use App\Models\Ponderacione;
use App\Models\Tema;
use App\Models\Encuesta;
use Illuminate\Http\Request;

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

    $cuestionarios = Cuestionario::with(['pregunta', 'repuesta', 'ponderacione'])
        ->whereHas('pregunta.encuesta', function ($query) use ($encuestaId) {
            $query->where('id', $encuestaId);
        })
        ->get();

    $respuestas = Repuesta::all();

    return view('cuestionarios', compact('cuestionarios', 'respuestas'));
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
        $ponderaciones= Ponderacione::select("id","ponderacion")->get()->pluck("ponderacion","id");
        return view('cuestionario.create', compact('cuestionario','pregunta','respuestas','ponderaciones'));
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

        $cuestionario = Cuestionario::create($request->all());

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario created successfully.');
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
            ->with('success', 'Cuestionario updated successfully');
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
            ->with('success', 'Cuestionario deleted successfully');
    }
}

