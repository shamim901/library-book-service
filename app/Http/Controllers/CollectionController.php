<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;


class CollectionController extends Controller
{

    public $collection_array = [];

    public function __construct () {

        $this->collection_array = [
             1, 2, 3, 4, 5, 6, 7
        ];
    }

    // official example 

    public function officialCollectionExample()
    {
        $collection = collect($this->collection_array)->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });
    }

    public function collectionClass()
    {
        $collection_class = new Collection($this->collection_array);

        return $collection_class;
    }

    public function collectMethod()
    {
        //Create a new collection using the collect method
        $collection_method = collect($this->collection_array);

        return $collection_method;
    }

    public function collectionMethods()
    {
        // return collect($this->collection_array)->all();

        // return collect($this->collection_array)->avg();

        // return collect($this->collection_array)->chunk(4)->all();




        // $collection = collect($this->collection_array);
 
        // $multiplied = $collection->map(function ($item) {
        //     return $item * 2;
        // });
         
        // return $multiplied->all();         



        // ok

    }
}
