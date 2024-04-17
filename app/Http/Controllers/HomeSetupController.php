<?php

namespace App\Http\Controllers;

use App\Models\HomeSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeSetupController extends Controller
{
    public function AllHomesetup()
    {
        $data = HomeSetup::all();
        return view('superadmin.homesetup', [
            'title' => 'home setup',
            'data' => $data
        ]);
    }

    public function HomesetupByUuid($uuid)
    {
        $detailhomesetup = HomeSetup::where('home_uuid', $uuid)->get();
        return view('superadmin.detailhomesetup', [
            'title' => 'detail home',
            'data' => $detailhomesetup
        ]);
    }

    public function AddHomesetup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'deskripsi' => 'required',
            'banner' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        // dd($validator);
        if ($validator->fails()) {
            return redirect('/homesetup')->withErrors($validator)->withInput();
        }
        try {
            $getFile = $request->file('banner');
            $getFileName = $getFile->hashName();

            $direktory = "/banner/$getFileName";
            $request->banner->move(public_path('/banner/'), $getFileName);

            $homesetup = new HomeSetup([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'banner' => $direktory
            ]);

            $homesetup->save();
            return redirect('/homesetup')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/homesetup')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateHomesetup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'deskripsi' => 'required',
            'banner' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect('/homesetup')->withErrors($validator)->withInput();
        }
        try {

            $home = HomeSetup::find($request->home_uuid);

            // Hapus foto yang sudah ada sebelumnya
            if ($home->banner) {
                File::delete(public_path($home->banner));
            }

            $fotoInDirectory = "/banner/";

            // Ambil file yang diupload gambar
            $getFile = $request->file('banner');

            // Hash nama file yang diupload
            $getFileName = $getFile->hashName();

            // Pindahkan file ke direktori yang ditentukan
            $getFile->move(public_path($fotoInDirectory), $getFileName);

            // Update data home dengan foto yang baru
            $home->title = $request->title;
            $home->deskripsi = $request->deskripsi;
            $home->banner = $fotoInDirectory . $getFileName;
            $home->save();
            return redirect('/homesetup')->with('success', 'Data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/homesetup')->withErrors(['errors' => 'Data gagal di edit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteHomesetup($uuid)
    {
        try {
            $homesetup = HomeSetup::find($uuid);
            // Hapus foto yang sudah ada sebelumnya
            if ($homesetup->banner) {
                File::delete(public_path($homesetup->banner));
            }
            $homesetup->delete();
            return redirect('/homesetup')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/homesetup')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
