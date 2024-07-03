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
        // $role = Role::create(['name' => 'Vendedor']);

        // // 04/08/2023 Wilbert Avila --- Productos
        // Permission::create(['name' => 'admin.products.create', 'description' => 'Crear productos']);
        // Permission::create(['name' => 'admin.products.edit', 'description' => 'Editar productos']);
        // Permission::create(['name' => 'admin.products.delete', 'description' => 'Eliminar productos']);

        // // 04/08/2023 Wilbert Avila --- Colores
        // Permission::create(['name' => 'admin.colors.index', 'description' => 'Ver colores']);
        // Permission::create(['name' => 'admin.colors.create', 'description' => 'Agregar colores']);
        // Permission::create(['name' => 'admin.colors.edit', 'description' => 'Editar colores']);
        // Permission::create(['name' => 'admin.colors.delete', 'description' => 'Eliminar colores']);

        // // 04/08/2023 Wilbert Avila --- Ordenes
        // Permission::create(['name' => 'admin.orders.index', 'description' => 'Ver ordenes']);

        // // 04/08/2023 Wilbert Avila --- Categorias
        // Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver categorias']);
        // Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categoria']);
        // Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categoria']);
        // Permission::create(['name' => 'admin.categories.delete', 'description' => 'Eliminar categoria']);


        // // 04/08/2023 Wilbert Avila --- Marcas
        // Permission::create(['name' => 'admin.brands.index', 'description' => 'Ver marcas']);
        // Permission::create(['name' => 'admin.brands.create', 'description' => 'Crear marca']);
        // Permission::create(['name' => 'admin.brands.edit', 'description' => 'Editar marca']);
        // Permission::create(['name' => 'admin.brands.delete', 'description' => 'Eliminar marca']);

        // // 04/08/2023 Wilbert Avila --- Departamentos
        // Permission::create(['name' => 'admin.departments.index', 'description' => 'Ver departamentos']);
        // Permission::create(['name' => 'admin.departments.create', 'description' => 'Crear departamentos']);
        // Permission::create(['name' => 'admin.departments.edit', 'description' => 'Editar departamentos']);
        // Permission::create(['name' => 'admin.departments.delete', 'description' => 'Eliminar departamentos']);

        // // 04/08/2023 Wilbert Avila --- Usuarios
        // Permission::create(['name' => 'admin.users.index', 'description' => 'Ver usuarios']);
        // Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios']);
        // Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios']);
        // Permission::create(['name' => 'admin.users.delete', 'description' => 'Eliminar usuarios']);

        // 03/07/2024 Wilbert Avila --- Roles
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver roles']);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles']);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles']);
        Permission::create(['name' => 'admin.roles.delete', 'description' => 'Eliminar roles']);

        //03/07/2024 Wilbert Avila --- Publicidades
        Permission::create(['name' => 'admin.covers.index', 'description' => 'Ver publicidades']);
        Permission::create(['name' => 'admin.covers.create', 'description' => 'Crear publicidades']);
        Permission::create(['name' => 'admin.covers.edit', 'description' => 'Editar publicidades']);
        Permission::create(['name' => 'admin.covers.delete', 'description' => 'Eliminar publicidades']);
    }
}
