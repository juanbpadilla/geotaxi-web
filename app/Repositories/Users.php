<?php

namespace App\Repositories;

use App\User;
use App\Role;
use App\Http\Controllers\Auth\RegisterController;

Class Users implements UsersInterface
{
    public function getPaginated()
    {
        return User::with(['roles', 'note'])
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(10);
    }

    public function store($request)
    {
        
        $user = User::create( $request->all());

        $user->roles()->attach($request->roles);

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