<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
// use Illuminate\Http\Request;

class CustomValidationController extends Controller
{
    public function show()
    {
        return view('test.custom-validation');
    }

    public function perform(InfoRequest $request)
    {
        return "ok";
        // Save after validated
    }
}
