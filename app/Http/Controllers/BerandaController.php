<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $data["user"] = User::all();
        return view('karyawan.dashboard', $data);
    }
}
