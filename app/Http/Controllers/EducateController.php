<?php

namespace App\Http\Controllers;

use App\Models\Educate;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EducateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $educates = Educate::where('users_id',auth()->user()->id)->paginate(2);
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
            'jenjang_pendidikan' => 'required|in:SD,SMP,SMA,SMK,S1,S2,S3,Kursus',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required|int',
            'tahun_lulus' => 'required|int',
            'pilihan' => 'required|in:Formal,Non-Formal',
        ]);

        $validasi['users_id'] = Auth::id();

        Educate::create(
            [
                'jenjang_pendidikan' => $validasi['jenjang_pendidikan'],
                'nama_sekolah' => $validasi['nama_sekolah'],
                'tahun_masuk' => $validasi['tahun_masuk'],
                'tahun_lulus' => $validasi['tahun_lulus'],
                'pilihan' => $validasi['pilihan'],
                'users_id' => $validasi['users_id'],
            ]
            );

        return redirect()->route('page2')->with('success', 'Data pendidikan berhasil disimpan.');
    }

    public function ExportPdf()
    {
        $educates = Educate::where('users_id', auth()->id())->get();
        $pdf = Pdf::loadView('karyawan.export_pdf', compact('educates'))->setPaper('A4','potrait');

        return $pdf->download('data-pendidikan.pdf');


    }

    public function ExportCsv()
    {
        $data = Educate::all();
        $filename = 'data-pendidikan.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('Jenjang Pendidikan', 'Nama Sekolah', 'Tahun Masuk', 'Tahun Lulus', 'Pilihan');
        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $educate) {
                $row['Jenjang Pendidikan']  = $educate->jenjang_pendidikan;
                $row['Nama Sekolah']    = $educate->nama_sekolah;
                $row['Tahun Masuk']    = $educate->tahun_masuk;
                $row['Tahun Lulus']  = $educate->tahun_lulus;
                $row['Pilihan']  = $educate->pilihan;

                fputcsv($file, array($row['Jenjang Pendidikan'], $row['Nama Sekolah'], $row['Tahun Masuk'], $row['Tahun Lulus'], $row['Pilihan']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

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
            'jenjang_pendidikan' => 'required|in:SD,SMP,SMA,SMK,D3,S1,S2,S3,Kursus',
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
