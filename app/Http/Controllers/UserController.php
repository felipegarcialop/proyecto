<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Docente;
use App\Models\Alumno;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Models\Institucione;
use App\Models\Grado;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Carga las relaciones 'grado.grupo' e 'institucion' para evitar consultas adicionales en la vista
        $data = User::with('grado.grupo', 'institucion')->paginate(5);

        // Pasa los datos a la vista y calcula el índice para la numeración de filas
        return view('users.index', [
            'data' => $data,
            'i' => ($request->input('page', 1) - 1) * 5
        ]);
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
    public function edit($id)
    {
        // Obtener el usuario a editar
        $user = User::find($id);
        
        // Obtener los datos para los campos desplegables
        $roles = Role::pluck('name', 'name')->all();
        $instituciones = Institucione::pluck('Nombre', 'id');
        $grados = Grado::join('grupos', 'grados.grupo_id', '=', 'grupos.id')
            ->select('grados.id',
                DB::raw('CONCAT(grados.descripcion, " ", grupos.descripcion) as grado_grupo'))
            ->pluck('grado_grupo', 'grados.id');
    
        // Obtener el rol del usuario
        $userRole = $user->roles->pluck('name')->toArray();
        
        // Pasar los datos a la vista
        return view('users.edit', compact('user', 'roles', 'instituciones', 'grados', 'userRole'));
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
        $roles = $request->input('roles');
        $user->assignRole($roles);

        // Llama al método para asignar el usuario a la tabla correspondiente
        $this->assignUserToRoleTable($user, $roles);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente');
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
        $previousRoles = $user->roles->pluck('name')->toArray();
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $roles = $request->input('roles');
        $user->assignRole($roles);

        // Llama al método para asignar el usuario a la tabla correspondiente
        $this->assignUserToRoleTable($user, $roles, $previousRoles);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    private function assignUserToRoleTable($user, $roles, $previousRoles = [])
    {
        // Elimina al usuario de la tabla correspondiente si tenía un rol previo
        foreach ($previousRoles as $role) {
            if (!in_array($role, $roles)) {
                if ($role == 'docente') {
                    Docente::where('user_id', $user->id)->delete();
                } elseif ($role == 'alumno') {
                    Alumno::where('user_id', $user->id)->delete();
                }
            }
        }

        // Asigna al usuario a la tabla correspondiente según el rol actual
        foreach ($roles as $role) {
            if ($role == 'docente') {
                Docente::updateOrCreate(
                    ['user_id' => $user->id],
                    ['user_id' => $user->id]
                );
            } elseif ($role == 'alumno') {
                Alumno::updateOrCreate(
                    ['user_id' => $user->id],
                    ['user_id' => $user->id]
                );
            }
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        // Elimina el usuario de las tablas correspondientes
        $this->removeUserFromRoleTables($user);

        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario borrado correctamente');
    }

    private function removeUserFromRoleTables($user)
    {
        $roles = $user->roles->pluck('name')->toArray();
        foreach ($roles as $role) {
            if ($role == 'docente') {
                Docente::where('user_id', $user->id)->delete();
            } elseif ($role == 'alumno') {
                Alumno::where('user_id', $user->id)->delete();
            }
        }
    }
}
