<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriKegiatanController extends Controller
{
    public function AllKategoriKegiatan()
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('superadmin.kategori_kegiatan', [
            'title' => 'kategori kegiatan',
            'data' => $kategori_kegiatan,
        ]);
    }
    public function AddKategoriKegiatan(Request $request)
    {
        Validator::make($request->all(), [
            'nama_kategori_kegiatan' => 'required',
        ]);
        try {
            $data = new KategoriKegiatan(['nama_kategori_kegiatan' => $request->nama_kategori_kegiatan]);
            $data->save();
            return redirect('/kategorikegiatan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/kategorikegiatan')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateKategoriKegiatan(Request $request)
    {
        Validator::make($request->all(), [
            'nama_kategori_kegiatan' => 'required',
        ]);
        try {
            $data = array(
                'nama_kategori_kegiatan' => $request->nama_kategori_kegiatan
            );
            KategoriKegiatan::where('kategori_uuid', $request->kategori_uuid)->update($data);
            return redirect('/kategorikegiatan')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/kategorikegiatan')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteKategoriKegiatan($uuid)
    {
        try {
            KategoriKegiatan::where('kategori_uuid', $uuid)->delete();
            return redirect('/kategorikegiatan')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/kategorikegiatan')->withErrors(['errors' => 'Data gagal di hapus: ' . $th->getMessage()])->withInput();
        }
    }
}
