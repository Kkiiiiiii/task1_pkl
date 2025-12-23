@extends('karyawan.template')
@section('title', 'Main Profile')
@section('content')
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
                            placeholder="John Doe"
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
                              class="form-control"
                              required />
                          </div>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please enter your no_ktp.</div>
                        </div>

                        <div class="mb-6">
                          <label class="form-label" for="bs-validation-email">Email</label>
                          <input
                            type="email"
                            id="bs-validation-email"
                            class="form-control"
                            placeholder="john.doe"
                            aria-label="john.doe"
                            required />
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please enter a valid email</div>
                        </div>

                        <div class="mb-6">
                          <label class="form-label" for="bs-validation-alamat">Alamat</label>
                          <input
                            type="Alamat"
                            id="bs-validation-Alamat"
                            class="form-control"
                            placeholder="john.doe"
                            aria-label="john.doe"
                            required />
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please enter a valid Alamat</div>
                        </div>

                        <div class="mb-6">
                          <label class="form-label" for="bs-validation-status_perkawina">Status Perkawinan</label>
                          <input
                            type="text"
                            class="form-control flatpickr-validation"
                            id="bs-validation-status_perkawina"
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
                              required
                              checked />
                            <label class="form-check-label" for="bs-validation-radio-male">Laki laki</label>
                          </div>
                          <div class="form-check">
                            <input
                              type="radio"
                              id="bs-validation-radio-female"
                              name="bs-validation-radio"
                              class="form-check-input"
                              required />
                            <label class="form-check-label" for="bs-validation-radio-female">Perempuan</label>
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
                        <div class="mb-6">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="bs-validation-checkbox" required />
                            <label class="form-check-label" for="bs-validation-checkbox"
                              >Agree to our terms and conditions</label
                            >
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>
                        <div class="mb-6">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="bootstrapValidationSwitch" required />
                            <label class="form-check-label" for="bootstrapValidationSwitch"
                              >Send me related emails</label
                            >
                          </div>
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
@endsection
