<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('listNasabah.cs');
        } else {
            return view('auth.login');
        }
    }

    /**
     * postLogin a newly created resource in storage.
     */
    public function postLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Cek verifikasi
        $user = User::where('email', $data['email'])->first();

        if (!$user || $user->email_verified_at === null) {
            Session::flash('error', 'Email Anda belum terverifikasi!');
            return redirect()->route('login');
        }

        if (Auth::attempt($data)) {
            $userIn = Auth::user();
            if ($userIn->role === 'admin') {
                return redirect()->route('listUsers.admin');
            } else {
                return redirect()->route('listNasabah.cs');
            }
        } else {
            Session::flash('error', 'Email/Password Anda salah. Cek kembali!');
            return redirect()->route('login');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
