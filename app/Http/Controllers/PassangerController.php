<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Role;
use App\User;
use App\Repositories\UsersInterface;
use App\Http\Requests\CreateUserRequest;

class PassangerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // $this->authorize($user);

        $roles = Role::pluck('display_name', 'id');
        
        return view('users.editRoles', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        // $this->authorize($user);

        $user->update($request->only('name', 'email'));

        $user->roles()->sync($request->roles);

        return back()->with('info', 'Usuario actualizado');
    }
}
