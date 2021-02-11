<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return route('home');
    }
    
    public function atras()
    {
        return back();
    }

   
}
