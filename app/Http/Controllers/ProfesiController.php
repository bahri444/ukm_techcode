<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Profesi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfesiController extends Controller
{
    public function AllProfesi()
    {
        $user = User::select('user_uuid', 'nama_lengkap')->get();
        $bidang = Bidang::select('bidang_uuid', 'nama_bidang')->get();
        $profesi = Profesi::with('joinToUser', 'joinToBidang')->get();
        return view('superadmin.profesi', [
            'title' => 'profesi',
            'data' => $profesi,
            'user' => $user,
            'bidang' => $bidang,
        ]);
    }

    public function AddProfesi(Request $request)
    {

        Validator::make($request->all(), [
            'user_uuid' => 'required',
            'bidang_uuid' => 'required',
        ]);
        try {
            $data = new Profesi([
                'user_uuid' => $request->user_uuid,
                'bidang_uuid' => $request->bidang_uuid,
            ]);
            $data->save();
            return redirect('/profesi')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/profesi')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateProfesi(Request $request)
    {
        Validator::make($request->all(), [
            'user_uuid' => 'required',
            'bidang_uuid' => 'required',
        ]);
        try {
            $data = array(
                'user_uuid' => $request->user_uuid,
                'bidang_uuid' => $request->bidang_uuid,
            );
            Profesi::where('profesi_uuid', $request->profesi_uuid)->update($data);
            return redirect('/profesi')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/profesi')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteProfesi($uuid)
    {
        try {
            Profesi::where('profesi_uuid', $uuid)->delete();
            return redirect('/profesi')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('/profesi')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
