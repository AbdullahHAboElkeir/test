<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function fristaction()
    {
            
    return view('test');
    }
    public function secondaction()
    {
        
        echo "This is the second action";
    }
}
