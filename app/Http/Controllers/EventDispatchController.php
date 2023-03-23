<?php

namespace App\Http\Controllers;

use App\Events\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventDispatchController extends Controller
{

    protected function authenticated() {

        $user = Auth::user();

        event(new LoginHistory($user));
    }
}
