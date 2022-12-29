@extends('layouts.sign')
@section('container')

  <main class="main-content  mt-0" style="background-color: #000046 ;">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start pb-11 m-3 border-radius-lg">
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-6 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-body">
                <div class="card-header text-center">
                  <h5>Form Pendaftaran PPDB</h5>
                  <p class="card-subheading text-center mb-3 font-weight-bold pb-3 text-dark">SMK Wikrama Bogor TP.
                    2023-2024</p>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
                
                <form action="{{ route('register.create') }}" method="post" role="form text-left">
                  @csrf
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="gender">
                      <option value="" hidden>--Jenis Kelamin--</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki - Laki</option>
                      </select>
                  </div>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Lengkap">
                  </div>
                  <div class="mb-3">
                      <label for="school" class="form-label">Asal Sekolah</label>
                      <select class="form-select" name="school" id="select_page" onChange="check(this);">
                        <option value="">--Asal Sekolah--</option>
                        @foreach($schools as $school)
                        <option value="{{ $school['nama_sekolah'] }}">{{ $school['nama_sekolah'] }}</option>
                        @endforeach
                        <option value="Lainnya">Lainnya</option>
                      </select>
                  </div>
                  <div class="mb-3" id="other-div" style="display:none;">
                    <label for="school" class="form-label">Masukkan Nama Sekolah</label>
                    <input id="other-inputs" type="text" class="form-control" name="school" placeholder="Masukkan Nama Sekolah">
                </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email Aktif">
                  </div>
                  <label for="phone_number" class="form-label">Nomor Handphone</label>
                  <div class="mb-3">
                    <input type="number" class="form-control" name="phone_number" placeholder="Contoh : 08-----">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="pn_father" class="form-label">Nomor HP Ayah</label>
                      <input type="number" class="form-control" name="pn_father" placeholder="Contoh : 08-----">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="pn_number" class="form-label">Nomor HP Ibu</label>
                      <input type="number" class="form-control" name="pn_mother" placeholder="Contoh : 08-----">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Registrasi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection
 
  