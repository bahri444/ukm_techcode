<?php

namespace App\Http\Controllers;

use App\Models\Profesi;
use Illuminate\Http\Request;

class BiografyController extends Controller
{
    public function Biografy()
    {
        $data = Profesi::with('joinToUser', 'joinToBidang')->get();
        $profesi = [];
        foreach ($data as $val) {
            foreach ($val->joinToUser as $rows) {
                foreach ($val->joinToBidang as $row) {
                    array_push($profesi, [
                        'foto_member' => $rows->foto,
                        'nama_lengkap' => $rows->nama_lengkap,
                        'nama_profesi' => $row->nama_bidang,
                    ]);
                }
            }
        }
        return view('landingpage.biografy', [
            'title' => 'biografy',
            'data' => $profesi
        ]);
    }
}
