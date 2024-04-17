<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasMemberController extends Controller
{
    public function AllKelasMember()
    {
        return view(
            'superadmin.kelas_member',
            [
                'title' => 'kelas member',
                'data' => 'data'
            ]
        );
    }
}
