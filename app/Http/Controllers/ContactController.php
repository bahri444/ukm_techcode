<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('landingpage.kontak', ['title' => 'kontak']);
    }
    public function KomentarMember(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required',
            'teks_saran' => 'required',
        ]);
        try {
            $saran = new Saran([
                'kode_member' => $request->username,
                'teks_saran' => $request->teks_saran,
            ]);

            $saran->save();
            return redirect('/kontak')->with('success', 'Saran berhasil terkirim');
        } catch (\Throwable $th) {
            return redirect('/kontak')->withErrors(['errors' => 'Saran gagal terkirim: ' . $th->getMessage()])->withInput();
        }
    }
}
