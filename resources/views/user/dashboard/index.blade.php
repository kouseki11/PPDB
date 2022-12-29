@extends('layouts.dashboard')
@section('container')
  
@if (session('success'))
    <script>
        Swal.fire(
        'Berhasil Login!',
        '',
        'success'
        )
    </script>
@endif

@if (session('notAllowed'))
<script>
    Swal.fire(
    'Kamu sudah Login!',
    '',
    'warning'
    )
</script>
@endif

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>    

        <ul class="navbar-nav">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img alt="image" src="https://ppdb.smkwikrama.sch.id/assets/admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              Hi, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <form action="{{ route('logout.auth') }}" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
              </li>
          </li>       
      </ul>
        </div>
    </nav>

    <!-- End Navbar -->

  <div class="py-4 container">
  <div class="row">
    <div class="col-md-6">
      <div class="card1 mt-3 p-3 g-2">
          <div class="d-flex justify-content-between">
              <h3 class="text1 d-flex align-items-center">{{ $user->name }}</h3>
               <div class="d-flex justify-content-sm-end">
              <img alt="image" src="https://ppdb.smkwikrama.sch.id/assets/admin/img/avatar/avatar-1.png" class="rounded-circle picture">
          </div>
          </div>
          <div class="detail mt-2">
              <ul class="list-group">
                  <table cellspacing="0" cellpadding="4">
                      <tbody><tr>
                          <th width="40%">Nomor Seleksi</th>
                          <td>:</td>
                          <td>{{ $user->id }}</td>
                      </tr>
                      <tr>
                          <th width="40%">NISN</th>
                          <td>:</td>
                          <td>{{ $user->nisn }}</td>
                      </tr>
                      <tr>
                          <th width="40%">Nama</th>
                          <td>:</td>
                          <td>{{ $user->name }}</td>
                      </tr>   
                      <tr>
                          <th width="40%">Nomor Hp</th>
                          <td>:</td>
                          <td>{{ $user->phone_number }}</td>
                      </tr>
                  </tbody></table>
              </ul>   
          </div>
      </div>
  </div>
  </div>
  </div>
  @if (Auth::user()->role == 'admin')
  <div class="py-2 mt-4 text-center text-dark" style="background-color: yellow;" role="alert">
    Silahkan mengecek data pendaftaran beserta bukti pembayaran para calon siswa!
  </div>
  @else
  @if($payment === null)

  @elseif($payment->status === "Pending")
  <div class="py-2 mt-4 text-center text-dark" style="background-color: yellow;" role="alert">
    Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya.
  </div>
  <div class="py-2 mt-4 text-center text-dark" style="background-color: rgb(0, 211, 0);" role="alert">
    Pembayaran telah dilakukan, silahkan menunggu admin melakukan validasi.
  </div>
  @else

  @endif
  @endif
  </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-dark" data-color="#02225B" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection