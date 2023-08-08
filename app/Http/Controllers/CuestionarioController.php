<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Repuesta;
use App\Models\Pregunta;
use App\Models\Tema;
use App\Models\Encuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class CuestionarioController
 * @package App\Http\Controllers
 */
class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarCuestionarios($id)
    {
        $encuestaId = $id;

        // Utilizamos groupBy para agrupar por la pregunta_id
        $cuestionariosGrouped = Cuestionario::with(['pregunta', 'repuesta'])
            ->whereHas('pregunta.encuesta', function ($query) use ($encuestaId) {
                $query->where('id', $encuestaId);
            })
            ->get()
            ->groupBy('pregunta_id'); // Agrupar por pregunta_id

        // Ahora tenemos una colección de preguntas con sus respuestas agrupadas
        // Para evitar repeticiones de preguntas, tomamos solo el primer elemento de cada grupo
        $cuestionarios = new Collection();
        foreach ($cuestionariosGrouped as $group) {
            $cuestionarios->push($group->first());
        }

        $respuestas = Repuesta::all();
        $con = DB::selectone ("select count(*) con from preguntas where encuesta_id = {$id}");

        return view('cuestionarios', compact('cuestionarios', 'respuestas', 'id', 'con'));
    }

    

    public function index()
    {
        $cuestionarios = Cuestionario::paginate();

        return view('cuestionario.index', compact('cuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $cuestionarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuestionario = new Cuestionario();
        $pregunta= Pregunta::pluck('pregunta','id');
        $respuestas =Repuesta::pluck('Respuestas','id');
        $res =Repuesta::all();
        return view('cuestionario.create', compact('cuestionario','pregunta','respuestas','res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cuestionario::$rules);
    
        $pregunta_id = $request->input('pregunta_id');
        $respuestas = $request->input('repuesta_id');
    
        try {
            foreach ($respuestas as $respuesta) {
                // Crear un nuevo registro para cada respuesta seleccionada
                Cuestionario::create([
                    'pregunta_id' => $pregunta_id,
                    'repuesta_id' => $respuesta,
                ]);
            }
    
            return redirect()->route('cuestionarios.index')
                ->with('success', 'La pregunta y sus respuestas se agregaron correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error while saving cuestionario: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuestionario = Cuestionario::find($id);

        return view('cuestionario.show', compact('cuestionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuestionario = Cuestionario::find($id);

        return view('cuestionario.edit', compact('cuestionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cuestionario $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuestionario $cuestionario)
    {
        request()->validate(Cuestionario::$rules);

        $cuestionario->update($request->all());

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuestionario = Cuestionario::find($id)->delete();

        return redirect()->route('cuestionarios.index')
            ->with('success', 'Cuestionario deleted successfully');
    }
    public function guardarCuestionarios(Request $request)
    {
        

        //dd($request->all());
        //dd($request);
        foreach ($request->idPregunta as $id_pregunta) {
            $var="respuesta_".$id_pregunta;
            $res = $request->$var;
           $user=  Auth::id(); 
            DB::insert("insert into formulario values(null, {$request->id}, {$id_pregunta}, {$res} ,{$user},now(),now())"); 
        }
    
        //$formId = DB::getPdo()->lastInsertId();
        //dd($formId);

        $cuestionarios = Cuestionario::paginate();

        return view('home', compact('cuestionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $cuestionarios->perPage());
    }
   
}

