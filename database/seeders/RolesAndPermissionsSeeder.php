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

        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $controlRole = Role::firstOrCreate(['name' => 'Control']);
        $participantRole = Role::firstOrCreate(['name' => 'Participante']);

        Permission::firstOrCreate(['name' => 'crear eventos']);
        Permission::firstOrCreate(['name' => 'editar eventos']);
        Permission::firstOrCreate(['name' => 'eliminar eventos']);
        Permission::firstOrCreate(['name' => 'ver eventos']);

        Permission::firstOrCreate(['name' => 'crear actividades']);
        Permission::firstOrCreate(['name' => 'editar actividades']);
        Permission::firstOrCreate(['name' => 'eliminar actividades']);
        Permission::firstOrCreate(['name' => 'ver actividades']);

        Permission::firstOrCreate(['name' => 'crear usuarios']);
        Permission::firstOrCreate(['name' => 'editar usuarios']);
        Permission::firstOrCreate(['name' => 'eliminar usuarios']);
        Permission::firstOrCreate(['name' => 'ver usuarios']);

        Permission::firstOrCreate(['name' => 'crear expositores']);
        Permission::firstOrCreate(['name' => 'editar expositores']);
        Permission::firstOrCreate(['name' => 'eliminar expositores']);
        Permission::firstOrCreate(['name' => 'ver expositores']);

        // Asignar permisos a roles (ejemplo)
        $adminRole->givePermissionTo(Permission::all()); // Admin puede hacer todo

        $controlRole->givePermissionTo([
            'ver eventos',
            'ver actividades',
            'ver usuarios',
        ]);

        $participantRole->givePermissionTo([
            'ver eventos',
            'ver actividades',
        ]);
    }
}
