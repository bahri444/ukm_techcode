<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function IndexMember()
    {
        $data = Kelas::all();
        return view('member.index', [
            'title' => 'halaman index',
            'data' => $data
        ]);
    }
    public function CheckoutKelas(Request $request)
    {
        Validator::make($request->all(), [
            'kelas_uuid' => 'required',
            'user_uuid' => 'required',
            'metode_pembayaran' => 'required'
        ]);
        try {
            $checkout = new KelasMember([
                'kelas_uuid' => $request->kelas_uuid,
                'user_uuid' => $request->user_uuid,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
            $checkout->save();
            return redirect('/mykelas')->with('success', 'checkout kelas berhasil');
        } catch (\Throwable $th) {
            return redirect('/index')->withErrors(['errors' => 'kelas gagal di cehckout ' . $th->getMessage()])->withInput();
        }
    }
    public function MyLearnKelas()
    {
        $data = KelasMember::with('joinToKelas', 'joinToUser')->where('user_uuid', Auth::user()->user_uuid)->get();
        return view('member.mykelas', [
            'title' => 'kelas saya',
            'data' => $data
        ]);
    }
    public function MyProfileAccount()
    {
        $data = User::where('user_uuid', Auth::user()->user_uuid)->get();
        return view('member.profile_user', [
            'title' => 'profile',
            'data' => $data
        ]);
    }
    public function UpdateFotoProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
        ]);
        // Validasi input
        if ($validator->fails()) {
            return redirect('/myprofile')->withErrors($validator)->withInput();
        }

        try {
            $user = User::find($request->user_uuid);
            if ($user->foto) {
                File::delete(public_path($user->foto));
            }
            $fotoInDirectory = "/profile_member/";
            $getFile = $request->file('foto');
            $getFileName = $getFile->hashName();
            $getFile->move(public_path($fotoInDirectory), $getFileName);
            $user->foto = $fotoInDirectory . $getFileName;
            $user->save();

            return redirect('/myprofile')->with('success', 'foto berhasil di perbarui');
        } catch (\Throwable $th) {
            return redirect('/myprofile')->withErrors(['errors' => 'foto gagal diperbarui: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateBiodata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'github' => 'required',
        ]);
        // Validasi input
        if ($validator->fails()) {
            return redirect('/myprofile')->withErrors($validator)->withInput();
        }

        try {
            $user = User::find($request->user_uuid);

            // Update data user dengan foto yang baru
            $user->nama_lengkap = $request->nama_lengkap;
            $user->email = $request->email;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->gender = $request->gender;
            $user->alamat = $request->alamat;
            $user->github = $request->github;
            $user->save();

            return redirect('/myprofile')->with('success', 'biodata berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect('/myprofile')->withErrors(['errors' => 'biodata gagal diperbarui: ' . $th->getMessage()])->withInput();
        }
    }
}
