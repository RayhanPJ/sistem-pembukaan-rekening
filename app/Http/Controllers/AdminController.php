<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $userAuth = auth()->user();
        $dataUser = User::all();

        if (Auth::check()) {
            // agar di navbar foto profile selalu sesuai
            if ($userAuth) {
                $navbarView = view('layouts.navbar', compact('userAuth'));
                $sidebarView = view('layouts.sidebar', compact('userAuth'));
                $footerView = view('layouts.footer', compact('userAuth'));

                return view('admin.master.users.listDataUser', compact('navbarView', 'sidebarView', 'footerView', 'userAuth', 'dataUser'));
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function getUsers()
    {
        $users = User::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $users
        ], 200);
    }

    public function approveUser(string $id)
    {
        $user = User::findOrFail($id);

        $user->email_verified_at = now();
        $user->updated_at = now();
        $user->save();

        return redirect()->back()->with('success', 'User sudah Di Approve!');
    }

    public function deleteUser(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'User sudah Di Delete!');
    }

}
