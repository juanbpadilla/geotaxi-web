<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;

Class Users implements UsersInterface
{
    public function getPaginated()
    {
        return User::with(['roles', 'note'])
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(10);
    }

    public function store($data)
    {
        
        // $user = User::create( $data->all());
        $user = User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach(3);

        return $user;
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function pluckRoles($id){
        return Role::pluck('display_name', 'id');
    }


    public function update($request, $user)
    {
        $user->update($request->only('nombre','apellido','telefono','email'));

        $user->roles()->sync($request->roles);

        return $user;
    }

    public function destroy($user)
    {
        $user->roles()->detach();

        return $user->delete();            
    }
}