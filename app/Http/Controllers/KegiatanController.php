<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function AllKegiatan()
    {
        $data = Kegiatan::with('joinToKategoriKegiatan')->get();
        $kategori = KategoriKegiatan::select('kategori_uuid', 'nama_kategori_kegiatan')->get();
        return view('superadmin.kegiatan', [
            'title' => 'kegiatan',
            'data' => $data,
            'kategori' => $kategori,
        ]);
    }
    public function KegiatanByUuid($uuid)
    {
        $kegiatan = Kegiatan::where('kegiatan_uuid', $uuid)->get();
        return view('superadmin.kegiatan_detail', [
            'title' => 'detail kegiatan',
            'data' => $kegiatan
        ]);
    }
    public function AddKegiatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_uuid' => 'required',
            'nama_kegiatan' => 'required',
            'foto_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        // Validasi input
        if ($validator->fails()) {
            return redirect('/kegiatan')->withErrors($validator)->withInput();
        }
        try {
            // dd("eksekusi");
            $getFile = $request->file('foto_kegiatan');
            $getFileName = $getFile->hashName();

            $direktory = "/foto_kegiatan/$getFileName";
            $request->foto_kegiatan->move(public_path('/foto_kegiatan/'), $getFileName);

            // Buat instance kegiatan baru
            $kegiatan = new Kegiatan([
                'kategori_uuid' => $request->kategori_uuid,
                'nama_kegiatan' => $request->nama_kegiatan,
                'foto_kegiatan' => $direktory,
                'deskripsi' => $request->deskripsi,
                'tempat' => $request->tempat,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai
            ]);

            $kegiatan->save();
            return redirect('/kegiatan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/kegiatan')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateKegiatan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kategori_uuid' => 'required',
            'nama_kegiatan' => 'required',
            'foto_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        // Validasi input
        if ($validator->fails()) {
            return redirect('/kegiatan')->withErrors($validator)->withInput();
        }
        try {

            $kegiatan = Kegiatan::find($request->kegiatan_uuid);

            // Hapus foto yang sudah ada sebelumnya
            if ($kegiatan->foto_kegiatan) {
                File::delete(public_path($kegiatan->foto_kegiatan));
            }

            $fotoInDirectory = "/foto_kegiatan/";

            // Ambil file yang diupload gambar
            $getFile = $request->file('foto_kegiatan');

            // Hash nama file yang diupload
            $getFileName = $getFile->hashName();

            // Pindahkan file ke direktori yang ditentukan
            $getFile->move(public_path($fotoInDirectory), $getFileName);

            // Update data kegiatan dengan foto yang baru
            $kegiatan->kategori_uuid = $request->kategori_uuid;
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->foto_kegiatan = $fotoInDirectory . $getFileName;
            $kegiatan->deskripsi = $request->deskripsi;
            $kegiatan->tempat = $request->tempat;
            $kegiatan->tanggal_mulai = $request->tanggal_mulai;
            $kegiatan->tanggal_selesai = $request->tanggal_selesai;
            $kegiatan->save();
            return redirect('/kegiatan')->with('success', 'Data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/kegiatan')->withErrors(['errors' => 'Data gagal di edit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteKegiatan($uuid)
    {
        try {
            $kegiatan = Kegiatan::find($uuid);
            // Hapus foto yang sudah ada sebelumnya
            if ($kegiatan->foto_kegiatan) {
                File::delete(public_path($kegiatan->foto_kegiatan));
            }
            $kegiatan->delete();
            return redirect('/kegiatan')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/kegiatan')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
