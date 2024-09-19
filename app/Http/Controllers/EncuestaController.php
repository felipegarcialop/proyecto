<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Tema;
use Illuminate\Http\Request;

/**
 * Class EncuestaController
 * @package App\Http\Controllers
 */
class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::paginate();

        return view('encuesta.index', compact('encuestas'))
            ->with('i', (request()->input('page', 1) - 1) * $encuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encuesta = new Encuesta();
        $tema = Tema::pluck('Nombre','id');
        return view('encuesta.create', compact('encuesta','tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Encuesta::$rules);

        $encuesta = Encuesta::create($request->all());

        return redirect()->route('encuestas.index')
            ->with('success', 'Encuesta creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.show', compact('encuesta'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuesta = Encuesta::find($id);
        $tema = Tema::pluck('Nombre', 'id'); // Asegúrate de obtener los temas
        return view('encuesta.edit', compact('encuesta', 'tema')); // Pasa la variable $tema a la vista
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Encuesta $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        request()->validate(Encuesta::$rules);

        $encuesta->update($request->all());

        return redirect()->route('encuestas.index')
            ->with('success', 'Encuesta editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $encuesta = Encuesta::find($id)->delete();

        return redirect()->route('encuestas.index')
            ->with('success', 'Encuesta borrada correctamente');
    }
}
