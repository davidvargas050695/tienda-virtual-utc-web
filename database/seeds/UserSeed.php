<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');

        /// crea los permisos para el crud del usuario
        ///
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        /// crea los permisos para el crud delas categorias

        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'read category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        /// crea los permisos para el crud de la subcategoria

        Permission::create(['name' => 'create subcategory']);
        Permission::create(['name' => 'read subcategory']);
        Permission::create(['name' => 'update subcategory']);
        Permission::create(['name' => 'delete subcategory']);

        /// crea los permisos para el crud de los productos
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'read product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'delete product']);

        //permisos para los clientes
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'read customer']);
        Permission::create(['name' => 'update customer']);
        Permission::create(['name' => 'delete customer']);

        //permisos para las ordenes o pedidos

        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'read order']);
        Permission::create(['name' => 'update order']);
        Permission::create(['name' => 'delete order']);


        /// cramos los roles para que son admin, tecnico1, tecnico 2, clinete
        $role = Role::create(['name' => 'admin']);

        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());

        ///<<<<----------- ROL CLIENTE  PERMISOS ----->>>>
        $role = Role::create(['name' => 'customer']);
        //asignacion de los permisos al rol TECNICO SECUNDARIO
        $role->givePermissionTo('read user');


        /*
            'name','last_name','username','birth_name','gender','ci', 'ruc','url_image', 'email','password',
        */

        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create([
            'name' => 'David',
            'last_name' => 'Vargas',
            'username' => 'admin',
            'birth_date' => '2020/12/12',
            'gender' => 'masculino',
            'ci' => '1750474012',
            'ruc' => '1750474012000',
            'url_image' => '#',
            'email' => 'admin@gmail.com',
            'password' => $user_password]);

        $user->assignRole('admin');
    }
}
