<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index() {
     /*    $response = rand(1,10);

        if ($response > 5) {
            return "number is greater than 5 it's = $response";
        }
        return "number is less than 5 it's .$response";
        // only one return wull execute, it will stop tha function after execution */

        $sum = 0;

        for ($i=0; $i < 10; $i++) { 
            $rand = rand(0,10);
            echo $rand.'<br>';
            $sum += $rand;
        }
        return view('welcome',array('sum' => $sum));
    }
}
