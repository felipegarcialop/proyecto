<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

/**
 * Class TemaController
 * @package App\Http\Controllers
 */
class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::paginate();

        return view('tema.index', compact('temas'))
            ->with('i', (request()->input('page', 1) - 1) * $temas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tema = new Tema();
        return view('tema.create', compact('tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tema::$rules);

        $tema = Tema::create($request->all());

        return redirect()->route('temas.index')
            ->with('success', 'Tema created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema = Tema::find($id);

        return view('tema.show', compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = Tema::find($id);

        return view('tema.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tema $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        request()->validate(Tema::$rules);

        $tema->update($request->all());

        return redirect()->route('temas.index')
            ->with('success', 'Tema updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tema = Tema::find($id)->delete();

        return redirect()->route('temas.index')
            ->with('success', 'Tema deleted successfully');
    }
}
