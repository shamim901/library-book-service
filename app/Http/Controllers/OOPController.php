<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OOPController extends Controller
{
    use Overloadable;



    public function methodOverLoading($name = "shamim")
    {
        // return $name;

          return $this->overload($arguments, [
            function (A $baz) {
               $this->functionThatProcessesObjectA($baz);
            },
            function (B $baz) {
               $this->functionThatProcessesObjectB($baz);
            },
        ]);

    }

    // public function methodOverLoading($name = "shamim", $nickname= "shahin")
    // {
    //     return $nickname;
    // }    
}


// method overload is not allowed in laravel/php. using trait it can be possible