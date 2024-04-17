<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaranController extends Controller
{
    public function AllSaran()
    {
        $saran = Saran::all();
        return view(
            'superadmin.saran',
            [
                'title' => 'saran',
                'data' => $saran
            ]
        );
    }
    public function AddSaran(Request $request)
    {
        Validator::make($request->all(), [
            'kode_member' => 'required',
            'teks_saran' => 'required',
        ]);
        try {
            $saran = new Saran([
                'kode_member' => $request->kode_member,
                'teks_saran' => $request->teks_saran,
            ]);

            $saran->save();
            return redirect('/saran')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/saran')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteSaran($uuid)
    {
        try {
            $saran = Saran::find($uuid);
            $saran->delete();
            return redirect('/saran')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/saran')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
