<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //Permissions
         $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'Listar_ver',
            'Crear_crear',
            'Editar_editar',
            'Eliminar_eliminar',
           
        ];
       
        
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
