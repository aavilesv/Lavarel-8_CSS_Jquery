<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $role1 = Role::create(['name' => 'Gerente']);
        $role2 = Role::create(['name' => 'Administrativo']);
        $role3 = Role::create(['name' => 'Soporte']);
        $role4 = Role::create(['name' => 'Soporte1']);

        // rutas provincia
        $permission = Permission::create(['name' => 'provincias.provincialistar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'provincias.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'provincias.ingresar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'provincias.editar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'provincias.update'])->syncRoles([$role1, $role2]);


        // ruta canton

        $permission = Permission::create(['name' => 'cantons.cantonlistar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cantons.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cantons.ingresar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cantons.editar'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'cantons.update'])->syncRoles([$role1, $role2]);

        // ruta clientes

        $permission = Permission::create(['name' => 'clientes.index'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'clientes.create'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'clientes.edit'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'clientes.destroy'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'pdfclieente.clientespdfall'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'pdfclieente.clientegetone'])->syncRoles([$role1, $role2]);

        // ruta novedades
        $permission = Permission::create(['name' => 'novedads.index'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'novedads.create'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'novedads.edit'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'novedads.destroy'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'pdfnovedad.novedadall'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'pdfnovedad.novedadgetone'])->syncRoles([$role1, $role2, $role3]);

        // ruta soportes
        $permission = Permission::create(['name' => 'soportes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'soportes.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'soportes.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'soportes.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);
    }
}
