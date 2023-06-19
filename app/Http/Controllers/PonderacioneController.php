<?php

namespace App\Http\Controllers;

use App\Models\Ponderacione;
use Illuminate\Http\Request;

/**
 * Class PonderacioneController
 * @package App\Http\Controllers
 */
class PonderacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ponderaciones = Ponderacione::paginate();

        return view('ponderacione.index', compact('ponderaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $ponderaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ponderacione = new Ponderacione();
        return view('ponderacione.create', compact('ponderacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ponderacione::$rules);

        $ponderacione = Ponderacione::create($request->all());

        return redirect()->route('ponderaciones.index')
            ->with('success', 'Ponderacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ponderacione = Ponderacione::find($id);

        return view('ponderacione.show', compact('ponderacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ponderacione = Ponderacione::find($id);

        return view('ponderacione.edit', compact('ponderacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ponderacione $ponderacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ponderacione $ponderacione)
    {
        request()->validate(Ponderacione::$rules);

        $ponderacione->update($request->all());

        return redirect()->route('ponderaciones.index')
            ->with('success', 'Ponderacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ponderacione = Ponderacione::find($id)->delete();

        return redirect()->route('ponderaciones.index')
            ->with('success', 'Ponderacione deleted successfully');
    }
}
