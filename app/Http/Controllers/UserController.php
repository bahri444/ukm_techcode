<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function AllUser()
    {
        $data = User::all();
        return view('superadmin.users', [
            'title' => 'data user',
            'data' => $data
        ]);
    }

    public function UserByUuid($uuid)
    {
        $user = User::where('user_uuid', $uuid)->get();
        return view('superadmin.detailuser', [
            'title' => 'detail user',
            'data' => $user
        ]);
    }
    public function AddUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'github' => 'required',
            'jenis_anggota' => 'required',
            'status_anggota' => 'required',
            'angkatan' => 'required',
        ]);

        // Validasi input
        if ($validator->fails()) {
            return redirect('/users')->withErrors($validator)->withInput();
        }
        try {
            // dd("eksekusi");
            $getFile = $request->file('foto');
            $getFileName = $getFile->hashName();

            $direktory = "/foto_member/$getFileName";
            $request->foto->move(public_path('/foto_member/'), $getFileName);

            // Buat instance User baru
            $user = new User([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'tanggal_lahir' => $request->tanggal_lahir,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'foto' => $direktory,
                'github' => $request->github,
                'jenis_anggota' => $request->jenis_anggota,
                'status_anggota' => $request->status_anggota,
                'angkatan' => $request->angkatan,
            ]);

            $user->save();
            return redirect('/users')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/users')->withErrors(['errors' => 'Data gagal ditambahkan: ' . $th->getMessage()])->withInput();
        }
    }
    public function UpdateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'role' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
            'github' => 'required',
            'jenis_anggota' => 'required',
            'status_anggota' => 'required',
            'angkatan' => 'required',
        ]);
        // dd($validator);

        // Validasi input
        if ($validator->fails()) {
            return redirect('/users')->withErrors($validator)->withInput();
        }

        try {
            $user = User::find($request->user_uuid);

            // Hapus foto yang sudah ada sebelumnya
            if ($user->foto) {
                File::delete(public_path($user->foto));
            }

            $fotoInDirectory = "/profile_member/";

            // Ambil file yang diupload gambar
            $getFile = $request->file('foto');

            // Hash nama file yang diupload
            $getFileName = $getFile->hashName();

            // Pindahkan file ke direktori yang ditentukan
            $getFile->move(public_path($fotoInDirectory), $getFileName);

            // Update data user dengan foto yang baru
            $user->nama_lengkap = $request->nama_lengkap;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->gender = $request->gender;
            $user->alamat = $request->alamat;
            $user->foto = $fotoInDirectory . $getFileName;
            $user->github = $request->github;
            $user->jenis_anggota = $request->jenis_anggota;
            $user->status_anggota = $request->status_anggota;
            $user->angkatan = $request->angkatan;
            // dd($user);
            $user->save();

            return redirect('/users')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/users')->withErrors(['errors' => 'Data gagal diedit: ' . $th->getMessage()])->withInput();
        }
    }
    public function ValidasiUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_member' => 'required',
            'github' => 'required',
            'role' => 'required',
            'jenis_anggota' => 'required',
            'status_anggota' => 'required',
            'angkatan' => 'required',
        ]);
        // dd($validator);
        try {
            $user = User::find($request->user_uuid);
            $user->kode_member = $request->kode_member;
            $user->role = $request->role;
            $user->github = $request->github;
            $user->jenis_anggota = $request->jenis_anggota;
            $user->status_anggota = $request->status_anggota;
            $user->angkatan = $request->angkatan;
            $user->save();

            return redirect('/users')->with('success', 'Data berhasil di validasi');
        } catch (\Throwable $th) {
            return redirect('/users')->withErrors(['errors' => 'Data gagal validasi: ' . $th->getMessage()])->withInput();
        }
    }
    public function DeleteUser($uuid)
    {
        try {
            $user = User::find($uuid);
            // Hapus foto yang sudah ada sebelumnya
            if ($user->foto) {
                File::delete(public_path($user->foto));
            }
            $user->delete();
            return redirect('/users')->with('success', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/users')->withErrors(['errors' => 'Data gagal dihapus: ' . $th->getMessage()])->withInput();
        }
    }
}
