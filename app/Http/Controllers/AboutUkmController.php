<?php

namespace App\Http\Controllers;

use App\Models\AboutUkm;
use Illuminate\Http\Request;

class AboutUkmController extends Controller
{
    public function AllAboutUkm()
    {
        $data = AboutUkm::all();
        return view('superadmin.about_ukm', [
            'title' => 'data ukm',
            'data' => $data
        ]);
    }
    public function ByUuidAboutUkm($uuid)
    {
    }
    public function AddAboutUkm(Request $request)
    {
    }
    public function UpdateAboutUkm(Request $request)
    {
    }
    public function DeleteAboutUkm($uuid)
    {
    }
}
