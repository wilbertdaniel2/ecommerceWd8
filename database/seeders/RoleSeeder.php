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
        //Permission::create(['name' => 'admin.products.index', 'description' => 'Ver modulo de administración', 'group' => 1]);
        Permission::create(['name' => 'admin.products.create', 'description' => 'Crear productos', 'group' => 1]);
        Permission::create(['name' => 'admin.products.edit', 'description' => 'Editar productos', 'group' => 1]);
        Permission::create(['name' => 'admin.products.delete', 'description' => 'Eliminar productos', 'group' => 1]);

        // // 04/08/2023 Wilbert Avila --- Colores
        Permission::create(['name' => 'admin.colors.index', 'description' => 'Ver colores', 'group' => 2]);
        Permission::create(['name' => 'admin.colors.create', 'description' => 'Agregar colores', 'group' => 2]);
        Permission::create(['name' => 'admin.colors.edit', 'description' => 'Editar colores', 'group' => 2]);
        Permission::create(['name' => 'admin.colors.delete', 'description' => 'Eliminar colores', 'group' => 2]);

        // // 04/08/2023 Wilbert Avila --- Ordenes
        Permission::create(['name' => 'admin.orders.index', 'description' => 'Ver ordenes', 'group' => 3]);

        // // 04/08/2023 Wilbert Avila --- Categorias
        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver categorias', 'group' => 4]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categoria', 'group' => 4]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categoria', 'group' => 4]);
        Permission::create(['name' => 'admin.categories.delete', 'description' => 'Eliminar categoria', 'group' => 4]);


        // // 04/08/2023 Wilbert Avila --- Marcas
        Permission::create(['name' => 'admin.brands.index', 'description' => 'Ver marcas', 'group' => 5]);
        Permission::create(['name' => 'admin.brands.create', 'description' => 'Crear marca', 'group' => 5]);
        Permission::create(['name' => 'admin.brands.edit', 'description' => 'Editar marca', 'group' => 5]);
        Permission::create(['name' => 'admin.brands.delete', 'description' => 'Eliminar marca', 'group' => 5]);

        // // 04/08/2023 Wilbert Avila --- Departamentos
        Permission::create(['name' => 'admin.departments.index', 'description' => 'Ver departamentos', 'group' => 6]);
        Permission::create(['name' => 'admin.departments.create', 'description' => 'Crear departamentos', 'group' => 6]);
        Permission::create(['name' => 'admin.departments.edit', 'description' => 'Editar departamentos', 'group' => 6]);
        Permission::create(['name' => 'admin.departments.delete', 'description' => 'Eliminar departamentos', 'group' => 6]);

        // // 04/08/2023 Wilbert Avila --- Usuarios
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver usuarios', 'group' => 7]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios', 'group' => 7]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios', 'group' => 7]);
        Permission::create(['name' => 'admin.users.delete', 'description' => 'Eliminar usuarios', 'group' => 7]);

        // // 03/07/2024 Wilbert Avila --- Roles
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver roles', 'group' => 8]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles', 'group' => 8]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles', 'group' => 8]);
        Permission::create(['name' => 'admin.roles.delete', 'description' => 'Eliminar roles', 'group' => 8]);

        // //03/07/2024 Wilbert Avila --- Publicidades
        Permission::create(['name' => 'admin.covers.index', 'description' => 'Ver publicidades', 'group' => 9]);
        Permission::create(['name' => 'admin.covers.create', 'description' => 'Crear publicidades', 'group' => 9]);
        Permission::create(['name' => 'admin.covers.edit', 'description' => 'Editar publicidades', 'group' => 9]);
        Permission::create(['name' => 'admin.covers.delete', 'description' => 'Eliminar publicidades', 'group' => 9]);

        
    }
}
