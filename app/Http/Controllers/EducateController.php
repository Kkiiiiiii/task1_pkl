<?php

namespace App\Http\Controllers;

use App\Models\Educate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EducateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $educates = Educate::all();
        return view('karyawan.page_2', compact('educates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'jenjang_pendidikan' => 'required|in:sd,smp,sma,smk,d3,s1,s2,s3,kursus',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required|int',
            'tahun_lulus' => 'required|int',
            'pilihan' => 'required|in:Formal,Non-Formal',
        ]);
        Educate::create(
            [
                'jenjang_pendidikan' => $validasi['jenjang_pendidikan'],
                'nama_sekolah' => $validasi['nama_sekolah'],
                'tahun_masuk' => $validasi['tahun_masuk'],
                'tahun_lulus' => $validasi['tahun_lulus'],
                'pilihan' => $validasi['pilihan'],
            ]
            );

        return redirect()->route('page2')->with('success', 'Data pendidikan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Educate $educate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Educate $educate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'jenjang_pendidikan' => 'required|in:sd,smp,sma,smk,d3,s1,s2,s3,kursus',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required|int',
            'tahun_lulus' => 'required|int',
            'pilihan' => 'required|in:Formal,Non-Formal',
        ]);

        $id = Crypt::decrypt($id);
        $educate = Educate::findOrFail($id);
        $educate->update($validasi);
        return redirect()->route('page2')->with('success', 'Data pendidikan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $id = Crypt::decrypt($id);
        Educate::findOrFail($id)->delete();
        return redirect()->route('page2')->with('success', 'Data pendidikan berhasil dihapus.');
    }
}
