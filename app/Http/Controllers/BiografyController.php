<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiografyController extends Controller
{
    public function Biografy()
    {
        return view('landingpage.biografy', ['title' => 'biografy']);
    }
}
