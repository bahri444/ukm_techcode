<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function Galery()
    {
        return view('landingpage.galery', ['title' => 'galery']);
    }
}
