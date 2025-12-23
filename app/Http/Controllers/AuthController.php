<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;

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
            'username' => 'string',
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
        // 'username' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'nohp' => $request->nohp,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'member',
    ]);

    Auth::login($user);

    return redirect()->route('loginIndex')->with('success','Registrasi Berhasil, Silahkan Login!');
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
