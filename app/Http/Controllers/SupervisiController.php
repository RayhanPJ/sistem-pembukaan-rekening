<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupervisiController extends Controller
{
    public function approveNasabah(string $id)
    {
        $nasabah = Nasabah::findOrFail($id);

        $nasabah->approval = 'approved';
        $nasabah->updated_at = now();
        $nasabah->save();

        return redirect()->back()->with('success', 'Nasabah sudah Di Approve!');
    }

    public function cancelNasabah(string $id)
    {
        $nasabah = Nasabah::findOrFail($id);

        $nasabah->approval = 'review';
        $nasabah->updated_at = now();
        $nasabah->save();

        return redirect()->back()->with('success', 'Nasabah sudah Di Cancel!');
    }
}
