<?php

namespace App\Http\Controllers;

use App\Models\Educate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('karyawan.page_2');
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
        $request->validate([
            'jenjang_pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required|date',
            'tahun_lulus' => 'required|date',
            'pilihan' => 'required|in:Formal,Non-Formal',
        ]);

        Educate::create($request->all());

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
    public function update(Request $request, Educate $educate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Educate $educate)
    {
        //
    }
}
