<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function Galery()
    {
        $data = Kegiatan::select('kegiatan_uuid', 'foto_kegiatan')->get();
        return view('landingpage.galery', [
            'title' => 'galery',
            'data' => $data,
        ]);
    }
    public function GaleryDetail($uuid)
    {
        $data = Kegiatan::with('joinToKategoriKegiatan')->where('kegiatan_uuid', $uuid)->get();;
        return view('landingpage.detail_galery', [
            'title' => 'galery',
            'data' => $data,
        ]);
    }
}
