<?php

namespace App\Http\Controllers;

use App\Models\HomeSetup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $data = HomeSetup::all();
        return view('landingpage.home', [
            'title' => 'index',
            'data' => $data
        ]);
    }
}
