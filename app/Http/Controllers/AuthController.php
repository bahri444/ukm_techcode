<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', ['title' => 'login']);
    }
    public function PostLogin(Request $request)
    {
        Validator::make($request->all(), [
            'kode_member' => 'required',
            'password' => 'required',
        ]);
        try {
            $data = $request->only('kode_member', 'password');
            if (Auth::attempt($data)) {
                if (Auth::user()->role == 'superadmin') {
                    return redirect()->route('dashboard')->withSuccess('Berhasil login');
                }
                return redirect()->route('index')->withSuccess('Berhasil login');
            }
        } catch (\Throwable $th) {
            return redirect('/login')->withErrors(['errors' => 'daftar akun gagal, ' . $th->getMessage()])->withInput();
        }
    }
    public function register()
    {
        return view('auth.register', ['title' => 'register']);
    }
    public function PostRegister(Request $request)
    {
        Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:1500',
        ]);
        try {
            $getFile = $request->file('foto');
            $getFileName = $getFile->hashName();

            $direktory = "/foto_member/$getFileName";
            $request->foto->move(public_path('/foto_member/'), $getFileName);

            // Buat instance user baru
            $user = new User([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tanggal_lahir' => $request->tanggal_lahir,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'foto' => $direktory
            ]);

            $user->save();
            return redirect('/login')->with('success', 'daftar akun berhasil, silahkan login');
        } catch (\Throwable $th) {
            return redirect('/register')->withErrors(['errors' => 'daftar akun gagal, ' . $th->getMessage()])->withInput();
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success', 'berhasil keluar');
    }
}
