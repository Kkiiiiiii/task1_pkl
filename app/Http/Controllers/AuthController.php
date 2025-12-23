<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginIndex()
    {
        //
        return view('karyawan.auth.login');
    }

    public function register()
    {
        return view('karyawan.auth.register');
    }

    public function profile()
    {
        return view('karyawan.main_profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $validasi = $request->validate([
            // 'username' => 'string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validasi)) {
            $user = Auth::user();

            return redirect()->route('dashboard')->with('success', 'Login berhasil. Selamat datang, ' . $user->nama_lengkap . '!');
        }

        return redirect()->route('loginIndex')->with('error', 'Username atau Password salah.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function regis(Request $request)
    {
        $request->validate([
        'email' => 'required',
        'nama_lengkap' => 'required',
        'no_ktp' => 'required',
        'no_handphone' => 'required',
        'alamat' => 'required',
        'status_perkawinan' => 'required',
        'jenis_kelamin' => 'required',
        'nama_ibu_kandung' => 'required',
        'password' => 'required|confirmed',
    ]);

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'no_ktp' => $request->no_ktp,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'no_handphone' => $request->no_handphone,
        'status_perkawinan' => $request->status_perkawinan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'nama_ibu_kandung' => $request->nama_ibu_kandung,
        'password' => bcrypt($request->password),

    ]);

    Auth::login($user);

    return redirect()->route('loginIndex')->with('success','Registrasi Berhasil, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('dashboard')->with('success', 'Anda telah logout.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
