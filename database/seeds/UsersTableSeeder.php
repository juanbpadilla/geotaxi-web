<?php

use App\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('role_user')->truncate();

        // $role2 = Role::create([
        //     'name' => 'cliente',
        //     'display_name' => 'Cliente',
        //     'description' => 'Cliente del sitio web'
        // ]);
        
        // for($i=0 ; $i < 50; $i++)
        // {
        //     if($i % 2 ==0)
        //     {
        //         $user1 = User::create([
        //             'nombre' => "nom_cliente{$i}",
        //             'apellido' => "ap_cliente{$i}",
        //             'sexo' => 'Hombre',
        //             'direccion' => "direccion_cliente{$i}",
        //             'telefono' => '777777',
        //             'email' => "cliente{$i}@email.com",
        //             'user_name' => "cliente{$i}",
        //             'password' => '123123',
        //             'created_at' => Carbon::now()->subDays(100)->addDays($i)
        //         ]);

        //         $user1->roles()->save($role2);
        //     }
        //     else
        //     {
        //         $user2 = User::create([
        //             'nombre' => "nom_cliente{$i}",
        //             'apellido' => "ap_cliente{$i}",
        //             'sexo' => 'Mujer',
        //             'direccion' => "direccion_cliente{$i}",
        //             'telefono' => '777777',
        //             'email' => "cliente{$i}@email.com",
        //             'user_name' => "cliente{$i}",
        //             'password' => '123123',
        //             'created_at' => Carbon::now()->subDays(100)->addDays($i)
        //         ]);

        //         $user2->roles()->save($role2);
        //     }
        // }
        
        $user = User::create([
            'nombre' => 'Juan',
            'apellido' => 'Padilla',
            'telefono' => '777777',
            'email' => 'juan@email.com',
            'password' => '123123',
        ]);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);
    }
}
