<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidangController extends Controller
{
    public function AllBidang()
    {
        $bidang = Bidang::all();
        return view('superadmin.bidang', [
            'title' => 'bidang',
            'data' => $bidang,
        ]);
    }

    public function AddBidang(Request $request)
    {

        Validator::make($request->all(), [
            'nama_bidang' => 'required',
        ]);
        try {
            $data = new Bidang(['nama_bidang' => $request->nama_bidang]);
            $data->save();
            return redirect('/bidang')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/bidang')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateBidang(Request $request)
    {
        Validator::make($request->all(), [
            'nama_bidang' => 'required',
        ]);
        try {
            $data = array(
                'nama_bidang' => $request->nama_bidang
            );
            Bidang::where('bidang_uuid', $request->bidang_uuid)->update($data);
            return redirect('/bidang')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/bidang')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteBidang($uuid)
    {
        try {
            Bidang::where('bidang_uuid', $uuid)->delete();
            return redirect('/bidang')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('/bidang')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
