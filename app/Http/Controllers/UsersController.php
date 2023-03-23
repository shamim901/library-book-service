<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UsersController extends Controller
{
 
    public function findUser (Request $request) {

        return (new UserService())->searchUser();
    }

}
