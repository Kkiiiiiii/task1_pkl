@extends('karyawan.template')
@section('title', 'Main Profile')
@section('content')
<h4>Login Dulu..</h4>
@if (Auth::check())
<div class="col-md">
          <div class="card">
            <h5 class="card-header">Profile</h5>
            <div class="card-body">
              <form class="needs-validation" novalidate>
                <div class="mb-6">
                  <label class="form-label" for="bs-validation-name">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bs-validation-name"
                    value="{{ Auth::user()->nama_lengkap }}"                 
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
                    value="{{ Auth::user()->no_ktp }}"                 
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
                    value="{{ Auth::user()->alamat }}"                 
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
                    value="{{ Auth::user()->email }}"                                    
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
                      value="{{ Auth::user()->no_handphone }}" />
                  </div>
                </div>

                <div class="mb-6">
                  <label class="form-label" for="bs-validation-status_perkawinan">Status Perkawinan</label>
                  <input
                    type="text"
                    class="form-control flatpickr-validation"
                    id="bs-validation-status_perkawina"
                    value="{{ Auth::user()->status_perkawinan }}"                 

                    required />
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please Enter Status Perkawinan</div>
                </div>
                <div class="mb-6">
                  <label class="d-block form-label">Jenis Kelamin</label>
                  <div class="form-check mb-2">
                    <input
                      type="radio"
                      id="bs-validation-radio-male"
                      name="bs-validation-radio"
                      class="form-check-input"
                      value="laki_laki"
                    {{ Auth::user()->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}


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
                    {{ Auth::user()->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                      required />
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                  </div>
                </div>
                <div class="mb-6">
                  <label class="form-label" for="bs-validation-upload-file">Profile pic</label>
                  <input type="file" class="form-control" id="bs-validation-upload-file" required />
                </div>
                <div class="mb-6">
                  <label class="form-label" for="bs-validation-nama_ibu_kandung">Nama Ibu Kandung</label>
                  <input
                   type="text"
                    class="form-control"
                    id="bs-validation-nama_ibu_kandung"
                    name="bs-validation-nama_ibu_kandung"
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
