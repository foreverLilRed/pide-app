<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Imagenes extends Controller
{
    public function mostrar($data)
    {
        return view('image-page', compact('data'));
    }
}
