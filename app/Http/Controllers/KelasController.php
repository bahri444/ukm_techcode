<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function Allkelas()
    {
        $kelas = Kelas::all();
        return view('superadmin.kelas', [
            'title' => 'data kelas',
            'data' => $kelas
        ]);
    }
    public function AddKelas(Request $request)
    {
        Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'harga_kelas' => 'required',
        ]);
        try {
            $kelas = new Kelas([
                'nama_kelas' => $request->nama_kelas,
                'jenis_kelas' => $request->jenis_kelas,
                'harga_kelas' => $request->harga_kelas,
            ]);
            $kelas->save();
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/kelas')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateKelas(Request $request)
    {
        Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'harga_kelas' => 'required',
        ]);
        try {
            $kelas = array(
                'nama_kelas' => $request->nama_kelas,
                'jenis_kelas' => $request->jenis_kelas,
                'harga_kelas' => $request->harga_kelas,
            );
            Kelas::where('kelas_uuid', $request->kelas_uuid)->update($kelas);
            return redirect('/kelas')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/kelas')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteKelas($uuid)
    {
        try {
            Kelas::where('kelas_uuid', $uuid)->delete();
            return redirect('/kelas')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/kelas')->withErrors(['errors' => 'Data gagal di hapus: ' . $th->getMessage()])->withInput();
        }
    }
}
