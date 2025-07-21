<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Control']);
        Role::create(['name' => 'Participante']);

        // Aquí también podrías crear permisos y asignarlos a roles si lo necesitas
        // Permission::create(['name' => 'editar eventos']);
        // $roleAdmin = Role::findByName('Administrador');
        // $roleAdmin->givePermissionTo('editar eventos');

        // Crear permisos
        //con ecentos
        Permission::create(['name' => 'crear eventos']);
        Permission::create(['name' => 'editar eventos']);
        Permission::create(['name' => 'eliminar eventos']);
        Permission::create(['name' => 'ver eventos']);

        //con actividades
        Permission::create(['name' => 'crear eventos']);
        Permission::create(['name' => 'editar eventos']);
        Permission::create(['name' => 'eliminar eventos']);
        Permission::create(['name' => 'ver eventos']);

        //con usuarios
        Permission::create(['name' => 'crear eventos']);
        Permission::create(['name' => 'editar eventos']);
        Permission::create(['name' => 'eliminar eventos']);
        Permission::create(['name' => 'ver eventos']);

        //


        
    }
}
