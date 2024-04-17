<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Models\User;
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
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'teks_saran' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/kontak')
                ->withErrors($validator)
                ->withInput();
        }
        $get_kode_member_inuser = User::where('kode_member', $request->username)->first(); // Menggunakan first() untuk mendapatkan satu objek saja.
        if ($get_kode_member_inuser) {
            $saran = new Saran([
                'kode_member' => $get_kode_member_inuser->kode_member,
                'teks_saran' => $request->teks_saran,
            ]);
            $saran->save();
            return redirect('/kontak')->with('success', 'Saran berhasil di kirim');
        } else {
            return redirect('/kontak')->withErrors(['errors' => 'Saran gagal di kirim'])->withInput();
        }
    }
}
