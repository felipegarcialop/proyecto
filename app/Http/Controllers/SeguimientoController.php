<?php

// app/Http/Controllers/SeguimientoController.php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Docente;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Muestra la vista con los alumnos del grado del docente.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::with('user.grado')->get();

        return view('seguimiento.index', compact('docentes'));
    }

    public function alumnosDelDocente($id)
    {
        $docente = Docente::find($id);

        if (!$docente) {
            return redirect()->route('seguimiento.index')->with('error', 'Docente no encontrado.');
        }

        // Obtener el grado y grupo del docente
        $grado = $docente->user->grado;
        $grupoId = $grado ? $grado->grupo_id : null;

        // Obtener los alumnos del mismo grado y grupo
        $alumnos = Alumno::whereHas('user', function ($query) use ($grado, $grupoId) {
            $query->where('grado_id', $grado ? $grado->id : null)
                  ->whereHas('grado', function ($q) use ($grupoId) {
                      $q->where('grupo_id', $grupoId);
                  });
        })->get();

        return view('seguimiento.alumnos', [
            'docente' => $docente,
            'alumnos' => $alumnos,
        ]);
    }

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