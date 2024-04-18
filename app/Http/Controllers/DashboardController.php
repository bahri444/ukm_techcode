<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $percobaan = User::where('jenis_anggota', 'percobaan')->get()->count();
        $pasti = User::where('jenis_anggota', 'pasti')->get()->count();
        $kehormatan = User::where('jenis_anggota', 'kehormatan')->get()->count();
        return view('superadmin.dashboard', [
            'title' => 'dashboard',
            'percobaan' => $percobaan,
            'pasti' => $pasti,
            'kehormatan' => $kehormatan,
        ]);
    }
}
