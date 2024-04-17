<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
