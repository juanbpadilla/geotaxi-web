<?php

namespace App\Repositories;

interface UsersInterface 
{
    public function getPaginated();

    public function store($data);
    
    public function findById($id);

    public function pluckRoles($id);
    
    public function update($request, $user);
    
    public function destroy($user);
}