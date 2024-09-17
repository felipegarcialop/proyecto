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
    public function index(Request $request)
{
    $search = $request->input('search');
    
    // Construir la consulta base
    $query = AAula::with(['docente.user', 'alumnos.user.grado.grupo']);

    // Aplicar el filtro de búsqueda si se proporciona un término de búsqueda
    if ($search) {
        $query->whereHas('docente.user', function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%");
        })->orWhere(function ($q) use ($search) {
            $q->where('alumno_ids', 'LIKE', "%{$search}%");
        });
    }

    $aAulas = $query->paginate();

    // Obtener todos los IDs de alumnos en el sistema
    $alumnos = Alumno::with(['user.grado.grupo'])->get()->keyBy('id');
    
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
    $docentes = Docente::with('user')->get()->pluck('user.name', 'id');
    $alumnos = []; // Inicialmente vacío

    return view('a-aula.form', compact('aAula', 'docentes', 'alumnos'));
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
            'alumno_id' => 'required|array'
        ]);
    
        $aAula = AAula::create($request->all());
    
        // Asociar alumnos seleccionados con la AAula
        $aAula->alumnos()->sync($request->input('alumno_id'));
    
        return redirect()->route('a-aulas.index')
            ->with('success', 'AAula created successfully.');
    }
    
    public function update(Request $request, AAula $aAula)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'alumno_id' => 'required|array'
        ]);
    
        $aAula->update($request->all());
    
        // Asociar alumnos seleccionados con la AAula
        $aAula->alumnos()->sync($request->input('alumno_id'));
    
        return redirect()->route('a-aulas.index')
            ->with('success', 'AAula updated successfully.');
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
    public function edit(AAula $aAula)
    {
        $docentes = Docente::with('user')->get()->pluck('user.name', 'id');
        $alumnos = Alumno::whereHas('user', function ($query) use ($aAula) {
            $query->where('grado_id', $aAula->docente->user->grado_id)
                  ->where('grupo_id', $aAula->docente->user->grupo_id);
        })->pluck('user.name', 'id');
    
        return view('a-aula.form', compact('aAula', 'docentes', 'alumnos'));
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
