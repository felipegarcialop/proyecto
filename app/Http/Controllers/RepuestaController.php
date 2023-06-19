<?php

namespace App\Http\Controllers;

use App\Models\Repuesta;
use Illuminate\Http\Request;

/**
 * Class RepuestaController
 * @package App\Http\Controllers
 */
class RepuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repuestas = Repuesta::paginate();

        return view('repuesta.index', compact('repuestas'))
            ->with('i', (request()->input('page', 1) - 1) * $repuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repuesta = new Repuesta();
        return view('repuesta.create', compact('repuesta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Repuesta::$rules);

        $repuesta = Repuesta::create($request->all());

        return redirect()->route('repuestas.index')
            ->with('success', 'Repuesta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repuesta = Repuesta::find($id);

        return view('repuesta.show', compact('repuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repuesta = Repuesta::find($id);

        return view('repuesta.edit', compact('repuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Repuesta $repuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repuesta $repuesta)
    {
        request()->validate(Repuesta::$rules);

        $repuesta->update($request->all());

        return redirect()->route('repuestas.index')
            ->with('success', 'Repuesta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $repuesta = Repuesta::find($id)->delete();

        return redirect()->route('repuestas.index')
            ->with('success', 'Repuesta deleted successfully');
    }
}
