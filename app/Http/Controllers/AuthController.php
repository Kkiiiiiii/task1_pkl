<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        $data['user'] = User::all();
        return view('karyawan.main_profile', $data);
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

        return redirect()->route('login')->with('error', 'Username atau Password salah.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function regis(Request $request)
    {
        $validasi = $request->validate([
        'nama_lengkap' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'no_ktp' => 'required|string|unique:users,no_ktp',
        'no_handphone' => 'required|string',
        'alamat' => 'required|string',
        'status_perkawinan' => 'required|in:menikah,belum_menikah',
        'jenis_kelamin' => 'required|string',
        'nama_ibu_kandung' => 'required|string',
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        'password' => 'required|confirmed',
    ]);

            if ($request->hasFile('foto')) {
            // Simpan foto dan ambil path lengkap
            $path = $request->file('foto')->store('profile_photos', 'public');
            $validasi['foto'] = $path;
        }

    $user = User::create($validasi);

    Auth::login($user);

    return redirect()->route('login')->with('success','Registrasi Berhasil, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/auth/login')->with('success', 'Anda telah logout.');
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
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_lengkap' => 'required|string',
            'no_ktp' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|string',
            'no_handphone' => 'required|string',
            'status_perkawinan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'nama_ibu_kandung' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $id = Crypt::decrypt($id);

        if($request->hasFile('foto')){
            $fotoPath = $request->file('foto')->store('profile_photos', 'public');
            $validasi['foto'] = $fotoPath;
        }

        User::where('id', $id)->update($validasi);

        return redirect()->route('profile')->with('success', 'Profile berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
