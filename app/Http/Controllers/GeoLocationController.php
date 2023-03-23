<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoLocationController extends Controller
{
    public function index(Request $request)
    {
            $ip = $request->ip();
            $data = \Location::get($ip);
            dd($data);
    }
}
