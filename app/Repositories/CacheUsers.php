<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class CacheUsers implements UsersInterface
{
    protected $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }
    
    public function getPaginated()
    {
        $key = "users.page." . request('page', 1);


        return Cache::tags('users')->rememberForever($key, function () {
            return $this->users->getPaginated();
        });
    }

    public function store($data)
    {
        $users = $this->users->store($data);

        Cache::tags('users')->flush();

        return $users;
    }

    public function findById($id)
    {
        return Cache::tags('users')->rememberForever("users.{$id}", function () use($id) {
            return $this->users->findById($id);
        });
    }

    public function pluckRoles($id){
        return $this->users->pluckRoles($id);
    }

    public function update($request, $user)
    {
        $user = $this->users->update($request, $user);

        Cache::tags('users')->flush();

        return $user;
    }

    public function destroy($user)
    {
        $user = $this->users->destroy($user);

        Cache::tags('users')->flush();

        return $user;
    }
}