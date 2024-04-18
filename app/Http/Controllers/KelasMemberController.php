<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasMemberController extends Controller
{
    public function AllKelasMember()
    {
        $data = KelasMember::with('joinToUser', 'joinToKelas')->get();
        $data_kelas = Kelas::select('kelas_uuid', 'nama_kelas')->get();
        $data_user = User::select('user_uuid', 'nama_lengkap')->get();
        return view(
            'superadmin.kelas_member',
            [
                'title' => 'kelas member',
                'data' => $data,
                'data_kelas' => $data_kelas,
                'data_user' => $data_user
            ]
        );
    }
    public  function AddKelasMember(Request $request)
    {
        Validator::make($request->all(), [
            'user_uuid' => 'required',
            'kelas_uuid' => 'required',
            'metode_pembayaran' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'status_kelas' => 'required',
        ]);
        try {

            $kelasmember = new KelasMember([
                'user_uuid' => $request->user_uuid,
                'kelas_uuid' => $request->kelas_uuid,
                'metode_pembayaran' =>  $request->metode_pembayaran,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'status_kelas' => $request->status_kelas,

            ]);
            $kelasmember->save();
            return redirect('/kelasmember')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect('/kelasmember')->withErrors(['errors' => 'Data gagal ditambah: ' . $th->getMessage()])->withInput();
        }
    }
    public  function UpdateKelasMember(Request $request)
    {
        Validator::make($request->all(), [
            'user_uuid' => 'required',
            'kelas_uuid' => 'required',
            'metode_pembayaran' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'status_kelas' => 'required',
        ]);
        try {
            $kelasmember = KelasMember::find($request->kelas_member_uuid);
            $kelasmember->user_uuid = $request->user_uuid;
            $kelasmember->kelas_uuid = $request->kelas_uuid;
            $kelasmember->metode_pembayaran = $request->metode_pembayaran;
            $kelasmember->mulai = $request->mulai;
            $kelasmember->selesai = $request->selesai;
            $kelasmember->status_kelas = $request->status_kelas;
            $kelasmember->save();

            return redirect('/kelasmember')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/kelasmember')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public  function ValidasiKelasMember(Request $request)
    {
        Validator::make($request->all(), [
            'mulai' => 'required',
            'selesai' => 'required',
            'status_kelas' => 'required',
        ]);
        try {
            $kelasmember = KelasMember::find($request->kelas_member_uuid);
            $kelasmember->mulai = $request->mulai;
            $kelasmember->selesai = $request->selesai;
            $kelasmember->status_kelas = $request->status_kelas;
            $kelasmember->save();
            return redirect('/kelasmember')->with('success', 'Data berhasil di validasi');
        } catch (\Throwable $th) {
            return redirect('/kelasmember')->withErrors(['errors' => 'Data gagal di validasi: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteKelasMember($uuid)
    {
        try {
            $kelasmember = KelasMember::find($uuid);
            $kelasmember->delete();
            return redirect('/kelasmember')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/kelasmember')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
