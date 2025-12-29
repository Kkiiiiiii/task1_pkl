@extends('karyawan.template')
@section('title', 'Main Profile')
@section('content')
@if (Auth::check())
<div class="col-md">
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
            <h5 class="card-header">Profile</h5>
            <div class="card-body">
              <form class="needs-validation" method="POST" action="{{ route('edit-profile', Crypt::encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                  <label class="form-label" for="bs-validation-name">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bs-validation-name"
                    name="nama_lengkap"
                    value="{{ $user->nama_lengkap }}"
                    required />
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please enter your name.</div>
                </div>

                <div class="mb-6 form-password-toggle">
                  <label class="form-label" for="bs-validation-no_ktp">No KTP</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="no_ktp"
                      id="bs-validation-no_ktp"
                    value="{{ $user->no_ktp }}"
                    name="no_ktp"
                      class="form-control"
                      required />
                  </div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please enter your no_ktp.</div>
                </div>


                <div class="mb-6">
                    <label class="form-label" for="bs-validation-alamat">Alamat</label>
                    <input
                    type="Alamat"
                    id="bs-validation-Alamat"
                    class="form-control"
                    name="alamat"
                    value="{{ $user->alamat }}"
                    required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter a valid Alamat</div>
                </div>

                <div class="mb-6">
                  <label class="form-label" for="bs-validation-email">Email</label>
                  <input
                    type="email"
                    id="bs-validation-email"
                    class="form-control"
                    name="email"
                    value="{{ $user->email }}"
                    required />
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please enter a valid email</div>
                </div>

                <div class="mb-6">
                  <label class="form-label" for="bs-validation-no_hp">No Handphone</label>
                  <div class="input-group">
                    <span class="input-group-text">ID (+62)</span>
                    <input
                      type="text"
                      id="modalEditUserPhone"
                      name="no_handphone"
                      class="form-control phone-number-mask"
                      placeholder="202 555 0111"
                      value="{{ $user->no_handphone }}" />
                  </div>
                </div>

                <div class="mb-6">
                  <div class="form-check mb-2">
                                    <input type="radio" class="form-check-input" id="menikah" name="status_perkawinan" value="menikah"
                                    {{ $user->status_perkawinan == 'menikah' ? 'checked' : '' }}
                                       required checked/>
                                <label class="form-check-label" for="menikah">Menikah</label>
                          </div>
                                <div class="form-check mb-2">
                                    <input type="radio" class="form-check-input" id="belum_menikah" name="status_perkawinan" value="belum_menikah"
                                    {{ $user->status_perkawinan == 'belum_menikah' ? 'checked' : '' }}
                                        required checked/>
                                <label class="form-check-label" for="belum_menikah">Belum Menikah</label>
                          </div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please Enter Status Perkawinan</div>
                </div>
                <div class="mb-6">
                  <label class="d-block form-label">Jenis Kelamin</label>
                  <div class="form-check mb-2">
                    <input
                      type="radio"
                      id="laki-laki"
                      name="jenis_kelamin"
                      class="form-check-input"
                      value="laki-laki"
                    {{  $user->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}


                      required
                      checked />
                    <label class="form-check-label" for="bs-validation-radio-male">Laki laki</label>
                  </div>
                  <div class="form-check">
                    <input
                      type="radio"
                      id="perempuan"
                      name="jenis_kelamin"
                      class="form-check-input"
                    value="perempuan"
                    {{  $user->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                      required />
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                  </div>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="bs-validation-upload-file">Foto Profile</label>
                  <img src="{{ asset('storage/' . $user->foto) }}" width="100" class="mb-2 img-thumbnail rounded-circle border"/>
                  <input type="file" class="form-control" id="bs-validation-upload-file" name="foto"/>
                </div>

                <div class="mb-6">
                  <label class="form-label" for="bs-validation-nama_ibu_kandung">Nama Ibu Kandung</label>
                  <input
                   type="text"
                    class="form-control"
                    id="bs-validation-nama_ibu_kandung"
                    name="nama_ibu_kandung"
                    value="{{ $user->nama_ibu_kandung }}"
                    required></input>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
@endif
@endsection
