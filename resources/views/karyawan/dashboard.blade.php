@extends('karyawan.template')
@section('title','Dashboard')
@section('content')
    <div class="container">
        @if(Auth::check())
        <h4>Selamat Datang, <strong>{{ Auth::user()->nama_lengkap }}</strong></h4>
        @endif
    </div>
@endsection
