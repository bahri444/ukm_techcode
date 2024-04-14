<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('landingpage.kontak', ['title' => 'kontak']);
    }
}
