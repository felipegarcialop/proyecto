<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Models\Institucione;
use App\Models\Grado;
use App\Models\Grupo;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Carga las relaciones 'grado.grupo' e 'institucion' para evitar consultas adicionales en la vista
        $data = User::with('grado.grupo', 'institucion')->paginate(5);

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $instituciones = Institucione::pluck('Nombre', 'id');
        $grados = Grado::join('grupos', 'grados.grupo_id', '=', 'grupos.id')
            ->select('grados.id',
                DB::raw('CONCAT(grados.descripcion, " ", grupos.descripcion) as grado_grupo'))
            ->pluck('grado_grupo', 'grados.id');

        return view('users.create', compact('grados', 'instituciones', 'roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            
            'institucion_id' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $instituciones = Institucione::pluck('Nombre', 'id');
        $grados = Grado::join('grupos', 'grados.grupo_id', '=', 'grupos.id')
            ->select('grados.id',
                DB::raw('CONCAT(grados.descripcion, " ", grupos.descripcion) as grado_grupo'))
            ->pluck('grado_grupo', 'grados.id');

        return view('users.edit', compact('user', 'roles', 'userRole', 'instituciones', 'grados'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'grado_id' => 'required',
            'institucion_id' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario borrado correctamente');
    }
}
