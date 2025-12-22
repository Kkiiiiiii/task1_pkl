@extends('karyawan.layout.sidebar')
@section('content')
    <div class="container">
        <h4>Selamat Datang, <strong>John</strong></h4>
    <div class="col-md-6">
      <div class="card">
          <h5 class="card-header">Float label</h5>
          <div class="card-body">
              <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                      aria-describedby="floatingInputHelp"/>
                  <label for="floatingInput">Name</label>
                  <div id="floatingInputHelp" class="form-text">
                      We'll never share your details with anyone else.
                  </div>
              </div>
          </div>
      </div>
  </div>
  <br>
 <div class="col-md-6">
                <div class="card">
                  <h5 class="card-header">Pilihan</h5>
                  <hr class="m-0"/>
                  <div class="card-body">
                    <small class="text-light fw-medium">Input select</small>
                    <div class="mb-4">
                      <label for="defaultSelect" class="form-label">Default select</label>
                      <select id="defaultSelect" class="form-select">
                        <option>Default select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
