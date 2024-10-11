<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuth = auth()->user();

        if (Auth::check()) {
            // agar di navbar foto profile selalu sesuai
            if ($userAuth) {
                $navbarView = view('layouts.navbar', compact('userAuth'));
                $sidebarView = view('layouts.sidebar', compact('userAuth'));
                $footerView = view('layouts.footer', compact('userAuth'));

                return view('admin.master.users.formUser', compact('navbarView', 'sidebarView', 'footerView', 'userAuth'));
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cabang_id' => 'required|exists:cabang,id', 
            'role' => 'required|in:cs,supervisi',
        ]);

        $allowedDomain = 'bank.co.id';  
        $email = $request->input('email');

        // Validate email domain
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

        // Validate that the email is unique
        if (User::where('email', $email)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar, email tidak boleh sama.');
        }

        // Check if the cabang already has a user with the same role
        $existingUser = User::where('cabang_id', $request->cabang_id)
            ->where('role', $request->role)
            ->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Cabang ini sudah memiliki ' . $request->role . '.');
        }

        // Hashing password before storing in the database
        $userData = $request->only(['name', 'email', 'cabang_id', 'role']);
        $userData['password'] = Hash::make($request->input('password'));
        $userData['remember_token'] = Str::random(60);

        // Create new user
        $createUser = User::create($userData);

        // Get the cabang and update its status using the model method
        $cabang = Cabang::find($request->cabang_id);
        $cabang->updateStatus(); 

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');
    }


}
