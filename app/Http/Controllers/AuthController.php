<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Siswa;

class AuthController extends Controller
{
    // Admin Login
    public function adminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminLoginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Username atau password salah']);
    }

    // Siswa Login
    public function siswaLogin()
    {
        return view('auth.siswa-login');
    }

    public function siswaLoginPost(Request $request)
    {
        $request->validate([
            'nis' => 'required'
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();
        
        if ($siswa) {
            session(['siswa_id' => $siswa->id, 'siswa_nis' => $siswa->nis]);
            return view('siswa.hasil', compact('siswa'));
        }

        return back()->withErrors(['error' => 'NIS tidak ditemukan']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget(['siswa_id', 'siswa_nis', 'admin_secret_logged_in']);
        return redirect('/');
    }
}