<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PocetnastranicaController extends Controller
{
    public function index(){
        return view('pocetnastranica'); //pocetnastranica.blade.php
    }
}
