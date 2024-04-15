<?php

namespace App\Http\Controllers;

use App\Models\KategoriModul;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriModulController extends Controller
{
    public function AllKategoriModul()
    {
        $kategori_modul = KategoriModul::with('joinToKelas')->get();
        $kelas = Kelas::select('kelas_uuid', 'nama_kelas')->get();
        return view('superadmin.kategori_modul', [
            'title' => 'kategori modul',
            'data' => $kategori_modul,
            'kelas' => $kelas,
        ]);
    }
    public function AddKategoriModul(Request $request)
    {
        Validator::make($request->all(), [
            'kelas_uuid' => 'required',
            'nama_kategori' => 'required',
        ]);
        try {
            $kategori_modul = new KategoriModul([
                'kelas_uuid' => $request->kelas_uuid,
                'nama_kategori' => $request->nama_kategori,
            ]);
            $kategori_modul->save();
            return redirect('/kategorimodul')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/kategorimodul')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateKategoriModul(Request $request)
    {
        Validator::make($request->all(), [
            'kelas_uuid' => 'required',
            'nama_kategori' => 'required',
        ]);
        try {
            $kategori_modul = array(
                'kelas_uuid' => $request->kelas_uuid,
                'nama_kategori' => $request->nama_kategori,
            );
            KategoriModul::where('kategori_uuid', $request->kategori_uuid)->update($kategori_modul);
            return redirect('/kategorimodul')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/kategorimodul')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteKategoriModul($uuid)
    {
        try {
            KategoriModul::where('kategori_uuid', $uuid)->delete();
            return redirect('/kategorimodul')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/kategorimodul')->withErrors(['errors' => 'Data gagal di hapus: ' . $th->getMessage()])->withInput();
        }
    }
}
