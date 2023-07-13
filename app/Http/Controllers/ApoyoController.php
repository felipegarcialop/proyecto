<?php

namespace App\Http\Controllers;

use App\Models\Apoyo;
use Illuminate\Http\Request;

/**
 * Class ApoyoController
 * @package App\Http\Controllers
 */
class ApoyoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apoyos = Apoyo::paginate();

        return view('apoyo.index', compact('apoyos'))
            ->with('i', (request()->input('page', 1) - 1) * $apoyos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apoyo = new Apoyo();
        return view('apoyo.create', compact('apoyo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Apoyo::$rules);

        $apoyo = Apoyo::create($request->all());

        return redirect()->route('Papoyos')
            ->with('success', 'Apoyo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apoyo = Apoyo::find($id);

        return view('apoyo.show', compact('apoyo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apoyo = Apoyo::find($id);

        return view('apoyo.edit', compact('apoyo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Apoyo $apoyo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apoyo $apoyo)
    {
        request()->validate(Apoyo::$rules);

        $apoyo->update($request->all());

        return redirect()->route('apoyos.index')
            ->with('success', 'Apoyo editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $apoyo = Apoyo::find($id)->delete();

        return redirect()->route('apoyos.index')
            ->with('success', 'Apoyo deleted successfully');
    }
}
