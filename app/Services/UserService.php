<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{

    public $user_id = 1;

    public function setUser($user)
    {
        $this->user_id =  $user;
    }

    public function searchUser()
    {

        $user =  User::find($this->user_id);

        if (!$user) {
            throw new ModelNotFoundException('User not found by ID ' . $this->user_id);
        }
        
        return $user;
    }

}