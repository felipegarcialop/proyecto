<?php

// app/Http/Controllers/SeguimientoController.php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Docente;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Muestra la lista de docentes con su grado y grupo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Obtener el usuario autenticado
    $usuarioAutenticado = auth()->user();

    // Obtener los docentes relacionados con el usuario autenticado
    // Asumiendo que hay una relación entre Docente y User que se puede filtrar
    $docentes = Docente::where('user_id', $usuarioAutenticado->id)
                        ->with('user.grado.grupo')
                        ->get();

    return view('seguimiento.index', compact('docentes'));
}

    

    /**
     * Muestra los alumnos del docente por grado y grupo.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function alumnosDelDocente($id)
    {
        // Buscar el docente por su ID y cargar relaciones con usuario, grado y grupo
        $docente = Docente::with('user.grado.grupo')->find($id);
    
        if (!$docente) {
            return redirect()->route('seguimiento.index')->with('error', 'Docente no encontrado.');
        }
    
        // Obtener el grado y grupo del docente
        $grado = $docente->user->grado;
        $grupo = $grado ? $grado->grupo : null;
    
        // Obtener los alumnos del mismo grado y grupo, ordenados alfabéticamente
        $alumnos = Alumno::join('users', 'alumnos.user_id', '=', 'users.id') // Unir la tabla 'users' con 'alumnos'
            ->join('grados', 'users.grado_id', '=', 'grados.id') // Unir la tabla 'grados'
            ->where('grados.id', $grado ? $grado->id : null) // Filtrar por el ID del grado del docente
            ->where('grados.grupo_id', $grupo ? $grupo->id : null) // Filtrar por el ID del grupo asociado al grado
            ->orderBy('users.name', 'asc') // Ordenar por el nombre del usuario
            ->select('alumnos.*') // Seleccionar solo las columnas de la tabla 'alumnos'
            ->get();
    
        // Retornar la vista con los datos del docente y los alumnos
        return view('seguimiento.alumnos', [
            'docente' => $docente,
            'alumnos' => $alumnos,
        ]);
    }

    /**
     * Almacena los datos del aula.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAula(Request $request)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'alumnos' => 'required|array',
            'alumnos.*' => 'exists:alumnos,id',
        ]);

        // Extraer los datos del formulario
        $docenteId = $request->input('docente_id');
        $alumnosIds = $request->input('alumnos');

        // Crear una nueva entrada en a_aulas
        $aAula = AAula::create([
            'docente_id' => $docenteId,
            'alumno_ids' => implode(',', $alumnosIds),
        ]);

        return redirect()->route('docentes.detalle', $docenteId)
                         ->with('success', 'Datos guardados exitosamente.');
    }
}