<?php

namespace App\Http\Controllers;

use App\Models\AAula;
use App\Models\Docente;
use App\Models\Alumno;
use Illuminate\Http\Request;

/**
 * Class AAulaController
 * @package App\Http\Controllers
 */
class AAulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $aAulas = AAula::paginate();

    // Obtener todos los IDs de alumnos en el sistema
    $alumnos = Alumno::all()->keyBy('id');

    return view('a-aula.index', compact('aAulas', 'alumnos'))
        ->with('i', (request()->input('page', 1) - 1) * $aAulas->perPage());
}


    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aAula = new AAula();
    
        // Obtener los nombres de los docentes asociados al modelo User
        $docentes = Docente::with('user')->get()->pluck('user.name', 'id');
        
        // Obtener los nombres de los alumnos asociados al modelo User
        $alumnos = Alumno::with('user')->get()->pluck('user.name', 'id');
    
        return view('a-aula.create', compact('aAula', 'docentes', 'alumnos'));
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
            'docente_id' => 'required|exists:docentes,id',
            'alumno_id' => 'required|array',
            'alumno_id.*' => 'exists:alumnos,id',
        ]);
    
        // Guardar el registro en la base de datos
        AAula::create([
            'docente_id' => $request->input('docente_id'),
            'alumno_ids' => $request->input('alumno_id'),
        ]);
    
        return redirect()->route('a-aulas.index')
            ->with('success', 'AAula created successfully.');
    }
    
    public function update(Request $request, AAula $aAula)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'alumno_id' => 'required|array',
            'alumno_id.*' => 'exists:alumnos,id',
        ]);
    
        $aAula->update([
            'docente_id' => $request->input('docente_id'),
            'alumno_ids' => $request->input('alumno_id'),
        ]);
    
        return redirect()->route('a-aulas.index')
            ->with('success', 'AAula updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $aAula = AAula::find($id);
    $alumnoIds = explode(',', $aAula->alumno_ids); // Convertir los IDs a array

    // Obtener los alumnos asociados
    $alumnos = Alumno::whereIn('id', $alumnoIds)->get();

    return view('a-aula.show', compact('aAula', 'alumnos'));
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $aAula = AAula::find($id);

    // Obtener los nombres de los docentes asociados al modelo User
    $docentes = Docente::with('user')->get()->pluck('user.name', 'id');
    
    // Obtener los nombres de los alumnos asociados al modelo User
    $alumnos = Alumno::with('user')->get()->pluck('user.name', 'id');
    
    return view('a-aula.edit', compact('aAula', 'docentes', 'alumnos'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AAula $aAula
     * @return \Illuminate\Http\Response
     */
    


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aAula = AAula::find($id)->delete();

        return redirect()->route('a-aulas.index')
            ->with('success', 'AAula deleted successfully');
    }
}
