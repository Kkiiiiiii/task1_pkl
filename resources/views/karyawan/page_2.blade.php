@extends('karyawan.template')
@section('title', 'Data Pendidikan')
@section('content')
    <div class="container">
           @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card">
            <div class="d-flex">
              <h5 class="card-header">Data Pendidikan</h5>
              <div class="row">
               <div class="col-12 mt-4 mb-4 ">
                 <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah Data</button>
               </div>
                </div>
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
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($educates as $e)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <i class="ti ti-brand-vue ti-md text-success me-4"></i>
                          <span class="fw-medium">{{ $e->jenjang_sekolah }}</span>
                        </td>
                        <td>{{ $e->nama_sekolah }}</td>
                        {{-- <td>
                          <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller">
                              <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Sophia Wilkerson">
                              <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker">
                              <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td> --}}
                        <td><span class="badge bg-label-info me-1">{{ $e->tahun_masuk }}</span></td>
                        <td><span class="badge bg-label-info me-1">{{ $e->tahun_lulus }}</span></td>
                        <td>{{ $e->pilihan }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="ti ti-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                >Delete</a
                              >
                               <form action="{{ route('educate-delete', $e->id) }}" method="POST" class="w-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-md"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data pendidikan ini?')">
                                        <i class="ti ti-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <div class="card-footer d-flex justify-content-center mt-4">
                        <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                    </ul>
                </div>
            </div>
               <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-tambah-data">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Data Pendidikan</h4>
                      </div>
                      <form id="Form" class="row g-6" method="POST" action="{{ route('educate-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modaltambahdataJenjang">Jenjang Pendidikan</label>
                          <input
                            type="text"
                            id="modaltambahdataJenjang"
                            name="jenjang_pendidikan"
                            class="form-control"
                            placeholder="Jenjang Pendidikan"
                             />
                          {{-- <select
                            id="modaltambahdataJenjang"
                            name="jenjang_pendidikan"
                            class="select2 form-select"
                            multiple>
                            <option value="">Select</option>
                            <option value="sd" selected>SD</option>
                            <option value="smp">SMP</option>
                            <option value="sma">SMA</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                            <option value="s3">S3</option>
                          </select> --}}
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modaltambahdataNamaSekolah">Nama Sekolah</label>
                          <input
                            type="text"
                            id="modaltambahdataNamaSekolah"
                            name="nama_sekolah"
                            class="form-control"
                            placeholder="Nama Sekolah"
                             />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modaltambahdataTahunMasuk">Tahun Masuk</label>
                          <input
                            type="number"
                            id="modaltambahdataTahunMasuk"
                            name="tahun_masuk"
                            class="form-control"
                            placeholder="-"
                             />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modaltambahdataTahunLulus">Tahun Lulus</label>
                          <input
                            type="number"
                            id="modaltambahdataTahunLulus"
                            name="tahun_lulus"
                            class="form-control"
                            placeholder="-"
                             />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modaltambahdataPilihan">Pilihan</label>
                          <select
                            id="modaltambahdataPilihan"
                            name="pilihan"
                            class="select2 form-select"
                            >
                            <option value="">Select</option>
                            <option value="formal" selected>Formal</option>
                            <option value="non_formal">Non Formal</option>
                          </select>
                        </div>
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-3">Submit</button>
                          <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
