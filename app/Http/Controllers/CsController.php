<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuth = auth()->user();
        $dataNasabah = Nasabah::all();

        if (Auth::check()) {
            // agar di navbar foto profile selalu sesuai
            if ($userAuth) {
                $navbarView = view('layouts.navbar', compact('userAuth'));
                $sidebarView = view('layouts.sidebar', compact('userAuth'));
                $footerView = view('layouts.footer', compact('userAuth'));

                return view('pages.listDataNasabah', compact('navbarView', 'sidebarView', 'footerView', 'userAuth', 'dataNasabah'));
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userAuth = auth()->user();

        if (Auth::check()) {
            // agar di navbar foto profile selalu sesuai
            if ($userAuth) {
                $navbarView = view('layouts.navbar', compact('userAuth'));
                $sidebarView = view('layouts.sidebar', compact('userAuth'));
                $footerView = view('layouts.footer', compact('userAuth'));

                return view('pages.formPembukaanRek', compact('navbarView', 'sidebarView', 'footerView', 'userAuth'));
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
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan_id' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nominal_setor' => 'required|numeric',
        ]);

        // Buat nasabah baru
        $createNasabah = Nasabah::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan_id' => $request->pekerjaan_id,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nama_jalan' => $request->nama_jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nominal_setor' => $request->nominal_setor,
            'approval' => 'review',
        ]);

        return redirect()->route('formNasabah.cs')->with('success', 'Anda Telah Berhasil Mendaftarkan Nasabah Baru!');
    }

    public function getNasabah()
    {
        $nasabah = Nasabah::with('pekerjaan')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $nasabah
        ], 200);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
