@extends('karyawan.template')
@section('title', 'Data Pendidikan')
@section('content')

<div class="container">

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Data Pendidikan</h5>
        <button class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah Data</button>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenjang Sekolah</th>
                    <th>Nama Sekolah</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                    <th>Pilihan</th>
                    <th>Aksi</th>
                    <th>Export</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educates as $e)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-medium">{{ $e->jenjang_pendidikan }}</td>
                    <td>{{ $e->nama_sekolah }}</td>
                    <td><span class="badge bg-label-info">{{ $e->tahun_masuk }}</span></td>
                    <td><span class="badge bg-label-info">{{ $e->tahun_lulus }}</span></td>
                    <td>{{ $e->pilihan }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editData{{ $e->id }}">
                                    <i class="ti ti-pencil me-1"></i> Edit
                                </button>
                                <form action="{{ route('educate-delete', Crypt::encrypt($e->id)) }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger" onclick="return confirm('Yakin Hapus Data Pendidikan {{ $e->nama_sekolah }}' + '?')">
                                        <i class="ti ti-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item">
                                    <i class="ti ti-cell me-1"></i> CSV
                                </button>
                                    <button class="dropdown-item">
                                        <i class="ti ti-book me-1"></i> PDF
                                    </button>
                            </div>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="editData{{ $e->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-simple">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                <h4 class="text-center mb-4">Edit Data Pendidikan</h4>

                                <form method="POST" action="{{ route('educate-update', Crypt::encrypt($e->id)) }}">
                                    @csrf

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Jenjang Pendidikan</label>
                                            <select name="jenjang_pendidikan" class="form-select">
                                                <option value="SD" {{ $e->jenjang_pendidikan=='SD'?'selected':'' }}>SD</option>
                                                <option value="SMP" {{ $e->jenjang_pendidikan=='SMP'?'selected':'' }}>SMP</option>
                                                <option value="SMA" {{ $e->jenjang_pendidikan=='SMA'?'selected':'' }}>SMA</option>
                                                <option value="SMK" {{ $e->jenjang_pendidikan=='SMK'?'selected':'' }}>SMK</option>
                                                <option value="S1" {{ $e->jenjang_pendidikan=='S1'?'selected':'' }}>S1</option>
                                                <option value="S2" {{ $e->jenjang_pendidikan=='S2'?'selected':'' }}>S2</option>
                                                <option value="S3" {{ $e->jenjang_pendidikan=='S3'?'selected':'' }}>S3</option>
                                                <option value="Kursus" {{ $e->jenjang_pendidikan=='Kursus'?'selected':'' }}>Kursus</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Nama Sekolah</label>
                                            <input type="text" name="nama_sekolah" class="form-control" value="{{ $e->nama_sekolah }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Tahun Masuk</label>
                                            <input type="number" name="tahun_masuk" class="form-control" value="{{ $e->tahun_masuk }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Tahun Lulus</label>
                                            <input type="number" name="tahun_lulus" class="form-control" value="{{ $e->tahun_lulus }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Pilihan</label>
                                            <select name="pilihan" class="form-select">
                                                <option value="Formal" {{ $e->pilihan=='Formal'?'selected':'' }}>Formal</option>
                                                <option value="Non-Formal" {{ $e->pilihan=='Non-Formal'?'selected':'' }}>Non Formal</option>
                                            </select>
                                        </div>

                                        <div class="col-12 text-center mt-3">
                                            <button class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="tambahdata" tabindex="-1">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                <h4 class="text-center mb-4">Tambah Data Pendidikan</h4>

                <form method="POST" action="{{ route('educate-store') }}">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Jenjang Pendidikan</label>
                            <select name="jenjang_pendidikan" class="form-select">
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Kursus">Kursus</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pilihan</label>
                            <select name="pilihan" class="form-select">
                                <option value="Formal">Formal</option>
                                <option value="Non-Formal">Non Formal</option>
                            </select>
                        </div>

                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
