<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostGuzzleController extends Controller
{
    public function index()
    {
        $response = Http::get('http://jsonplaceholder.typicode.com/posts');
   
        $jsonData = $response->json();
         
        return $jsonData;
    }
 
    public function store()
    {
        $response = Http::post('http://jsonplaceholder.typicode.com/posts', [
                    'title' => 'This is test from tutsmake.com',
                    'body' => 'This is test from tutsmake.com as body',
                ]);
   
        return $response->successful();
    }
}
