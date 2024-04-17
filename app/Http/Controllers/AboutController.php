<?php

namespace App\Http\Controllers;

use App\Models\AboutUkm;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About()
    {
        $data = AboutUkm::all();
        return view('landingpage.tentang', [
            'title' => 'tentang',
            'data' => $data
        ]);
    }
}
