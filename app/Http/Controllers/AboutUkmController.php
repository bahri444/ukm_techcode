<?php

namespace App\Http\Controllers;

use App\Models\AboutUkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AboutUkmController extends Controller
{
    public function AllAboutUkm()
    {
        $data = AboutUkm::all();
        return view('superadmin.about_ukm', [
            'title' => 'data ukm',
            'data' => $data
        ]);
    }
    public function ByUuidAboutUkm($uuid)
    {
        $ukm = AboutUkm::where('ukm_uuid', $uuid)->get();
        return view('superadmin.detailukm', [
            'title' => 'detail ukm',
            'data' => $ukm
        ]);
    }
    public function AddAboutUkm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/ukm')->withErrors($validator)->withInput();
        }
        try {
            $getFile = $request->file('logo');
            $getFileName = $getFile->hashName();

            $direktory = "/logo/$getFileName";
            $request->logo->move(public_path('/logo/'), $getFileName);

            $ukm = new AboutUkm([
                'nama' => $request->nama,
                'logo' => $direktory,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'tujuan' => $request->tujuan
            ]);

            $ukm->save();
            return redirect('/ukm')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/ukm')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateAboutUkm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/ukm')->withErrors($validator)->withInput();
        }
        try {

            $ukm = AboutUkm::find($request->ukm_uuid);

            // Hapus foto yang sudah ada sebelumnya
            if ($ukm->logo) {
                File::delete(public_path($ukm->logo));
            }

            $fotoInDirectory = "/logo/";

            // Ambil file yang diupload gambar
            $getFile = $request->file('logo');

            // Hash nama file yang diupload
            $getFileName = $getFile->hashName();

            // Pindahkan file ke direktori yang ditentukan
            $getFile->move(public_path($fotoInDirectory), $getFileName);

            // Update data ukm dengan foto yang baru
            $ukm->nama = $request->nama;
            $ukm->logo = $fotoInDirectory . $getFileName;
            $ukm->visi = $request->visi;
            $ukm->misi = $request->misi;
            $ukm->tujuan = $request->tujuan;
            $ukm->save();
            return redirect('/ukm')->with('success', 'Data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/ukm')->withErrors(['errors' => 'Data gagal di edit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteAboutUkm($uuid)
    {
        try {
            $ukm = AboutUkm::find($uuid);
            // Hapus foto yang sudah ada sebelumnya
            if ($ukm->logo) {
                File::delete(public_path($ukm->logo));
            }
            $ukm->delete();
            return redirect('/ukm')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/ukm')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
