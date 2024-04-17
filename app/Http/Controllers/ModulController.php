<?php

namespace App\Http\Controllers;

use App\Models\KategoriModul;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulController extends Controller
{
    public function AllModul()
    {
        $modul = Modul::with('joinToKategoriModul')->get();
        return view(
            'superadmin.modul',
            [
                'title' => 'modul',
                'data' => $modul
            ]
        );
    }
    public function AddModulShow()
    {
        $kategori_modul = KategoriModul::select('kategori_uuid', 'nama_kategori')->get();
        return view(
            'superadmin.add_modul',
            [
                'title' => 'Tambah modul',
                'data' => $kategori_modul
            ]
        );
    }
    public function AddModul(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_uuid' => 'required',
            'judul' => 'required',
            'materi' => 'required',
            'kode' => 'required',
        ]);
        try {
            // dd("eksekusi");
            $modul = new Modul([
                'kategori_uuid' => $request->kategori_uuid,
                'judul' => $request->judul,
                'materi' => $request->materi,
                'kode' => $request->kode
            ]);

            $modul->save();
            return redirect('/modul')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/addmodul')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateModulShow($uuid)
    {
        $kategori_modul = KategoriModul::select('kategori_uuid', 'nama_kategori')->get();
        $modul = Modul::where('modul_uuid', $uuid)->get();
        return view(
            'superadmin.update_modul',
            [
                'title' => 'Update modul',
                'data' => $modul,
                'kategori_modul' => $kategori_modul,
            ]
        );
    }
    public function UpdateModul(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_uuid' => 'required',
            'judul' => 'required',
            'materi' => 'required',
            'kode' => 'required',
        ]);
        // dd($validator);
        try {
            // dd("eksekusi");
            $modul = array(
                'kategori_uuid' => $request->kategori_uuid,
                'judul' => $request->judul,
                'materi' => $request->materi,
                'kode' => $request->kode
            );

            Modul::where('modul_uuid', $request->modul_uuid)->update($modul);
            return redirect('/modul')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect("/updatemodul/$request->modul_uuid")->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }

    public function DeleteModul($uuid)
    {
        try {
            $modul = Modul::find($uuid);
            $modul->delete();
            return redirect('/modul')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/modul')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
