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

        $user = User::create([
            'nombre' => 'Juan',
            'apellido' => 'Padilla',
            'telefono' => '777777',
            'email' => 'juan@email.com',
            'password' => bcrypt(123123)
        ]);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);

        $role = Role::create([
            'name' => 'mod',
            'display_name' => 'Moderador',
            'description' => 'Moderador de comentarios'
        ]);
        
        $role = Role::create([
            'name' => 'client',
            'display_name' => 'Cliente',
            'description' => 'Cliente'
        ]);
    }
}
