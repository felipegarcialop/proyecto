<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\User;
use App\Models\Grado;
use App\Models\Grupo;
use Illuminate\Http\Request;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
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
            $alumnos = Alumno::whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate();
        } else {
            $alumnos = Alumno::paginate();
        }

        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        $users = User::role('alumno')->pluck('name', 'id');
        $grados = Grado::pluck('nombre', 'id');
        $grupos = Grupo::pluck('nombre', 'id');

        return view('alumno.create', compact('alumno', 'users', 'grados', 'grupos'));
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
        $alumno = Alumno::updateOrCreate(
            ['user_id' => $user->id],
            ['grado_id' => $request->input('grado_id'), 'grupo_id' => $request->input('grupo_id')]
        );

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado/actualizado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        $users = User::role('alumno')->pluck('name', 'id');
        $grados = Grado::pluck('nombre', 'id');
        $grupos = Grupo::pluck('nombre', 'id');

        return view('alumno.edit', compact('alumno', 'users', 'grados', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'grado_id' => 'required|exists:grados,id',
            'grupo_id' => 'required|exists:grupos,id'
        ]);

        $alumno->update([
            'user_id' => $request->input('user_id'),
            'grado_id' => $request->input('grado_id'),
            'grupo_id' => $request->input('grupo_id')
        ]);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente');
    }
}
