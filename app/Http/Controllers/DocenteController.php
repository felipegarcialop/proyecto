<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use App\Models\Grado;
use App\Models\Grupo;
use Illuminate\Http\Request;

/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtener el término de búsqueda

        if ($search) {
            $docentes = Docente::whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate();
        } else {
            $docentes = Docente::paginate();
        }

        return view('docente.index', compact('docentes'))
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();
        $users = User::role('docente')->pluck('name', 'id');
        $grados = Grado::pluck('nombre', 'id');
        $grupos = Grupo::pluck('nombre', 'id');

        return view('docente.create', compact('docente', 'users', 'grados', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'grado_id' => 'required|exists:grados,id',
            'grupo_id' => 'required|exists:grupos,id'
        ]);

        $user = User::find($request->input('user_id'));
        $docente = Docente::updateOrCreate(
            ['user_id' => $user->id],
            ['grado_id' => $request->input('grado_id'), 'grupo_id' => $request->input('grupo_id')]
        );

        return redirect()->route('docentes.index')
            ->with('success', 'Docente creado/actualizado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        $users = User::role('docente')->pluck('name', 'id');
        $grados = Grado::pluck('nombre', 'id');
        $grupos = Grupo::pluck('nombre', 'id');

        return view('docente.edit', compact('docente', 'users', 'grados', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'grado_id' => 'required|exists:grados,id',
            'grupo_id' => 'required|exists:grupos,id'
        ]);

        $docente->update([
            'user_id' => $request->input('user_id'),
            'grado_id' => $request->input('grado_id'),
            'grupo_id' => $request->input('grupo_id')
        ]);

        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente eliminado correctamente');
    }

    // Función para el seguimiento
    public function seguimiento()
    {
        // Obtener todos los docentes con las relaciones necesarias
        $docentes = Docente::with('user.grado.grupo')->get();

        // Pasar los datos a la vista
        return view('seguimiento.index', compact('docentes'));
    }

    public function detalle($id)
    {
        $docente = Docente::find($id);
        return view('docente.detalle', compact('docente'));
    }
}
