<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function cekKelulusan(Request $request)
    {
        $request->validate([
            'nis' => 'required'
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();
        
        if (!$siswa) {
            return back()->withErrors(['error' => 'NIS tidak ditemukan dalam database']);
        }

        return view('siswa.hasil', compact('siswa'));
    }

    public function dashboard()
    {
        if (!session('siswa_id')) {
            return redirect('/');
        }

        $siswa = Siswa::with('nilai')->find(session('siswa_id'));
        
        if (!$siswa) {
            return redirect('/');
        }

        return view('siswa.dashboard', compact('siswa'));
    }
}