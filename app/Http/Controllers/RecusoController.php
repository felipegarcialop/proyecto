<?php

namespace App\Http\Controllers;

use App\Models\Recuso;
use Illuminate\Http\Request;

/**
 * Class RecusoController
 * @package App\Http\Controllers
 */
class RecusoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recusos = Recuso::paginate();

        return view('recuso.index', compact('recusos'))
            ->with('i', (request()->input('page', 1) - 1) * $recusos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recuso = new Recuso();
        return view('recuso.create', compact('recuso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Recuso::$rules);

        $recuso = Recuso::create($request->all());

        return redirect()->route('Precursos')
            ->with('success', 'Recuso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recuso = Recuso::find($id);

        return view('recuso.show', compact('recuso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recuso = Recuso::find($id);

        return view('recuso.edit', compact('recuso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recuso $recuso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recuso $recuso)
    {
        request()->validate(Recuso::$rules);

        $recuso->update($request->all());

        return redirect()->route('recusos.index')
            ->with('success', 'Recuso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recuso = Recuso::find($id)->delete();

        return redirect()->route('recusos.index')
            ->with('success', 'Recuso deleted successfully');
    }
}
