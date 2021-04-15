<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // function for show about page 
    public function index()
    {
        return view('about');
    }
    
}
