@extends('layouts.dashboard')
@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Payment</a></li>
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

    @if (Auth::user()->role == 'admin')
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Payment Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Registrasi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail Pendaftaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  @foreach($user as $users)
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $users->user->id }}</span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="https://ppdb.smkwikrama.sch.id/assets/admin/img/avatar/avatar-1.png"class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $users->user->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><a href="{{ route('bukti.pembayaran', $users->id) }}">Lihat</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><a href="{{ route('detail.pendaftaran', $users->user->id) }}">Detail</span>
                      </td>
                      @if($users->status === "Pending")
                      <td class="align-middle">
                        <form action="{{ route('validasiPembayaran', $users->id) }}" method="post" id="create-form" class="w-75">
                           @method('patch')
                          @csrf
                          <button type="submit" class="btn btn-success">Validasi</button>
                      </form>
                      </td>
                      <td class="align-middle">
                        <form action="{{ route('tolakPembayaran', $users->id) }}" method="post" id="create-form" class="w-75">
                          @method('patch')
                          @csrf
                          <button type="submit" class="btn btn-danger">Tolak</button>
                      </form>
                      </td>
                      @elseif($users->status === "Rejected")
                      <td class="align-middle">
                        <span class="text-center text-xs font-weight-bold">DiTolak</span>
                      </td>
                      @elseif($users->status === "Accepted")
                      <td class="align-middle">
                        <span class="text-center text-xs font-weight-bold">DiValidasi</span>
                      </td>
                      @else
                      @endif
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      @if($payment == null)
    <div class="py-4 container">
      <div class="row">
        <div class="col-md-20">
          <div class="card1 mt-3 p-3 g-2">
           <div class="card-header text-warning">
            <b>Form Pembayaran</b>
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
           <div class="card-body mt-3">
            <form action="{{ route('payment.create') }}" method="POST" class="form-profile" enctype="multipart/form-data">
              @csrf
            <div class="row">
              <div class="form-group col-sm-4">
                <label for="bank" class="form-label text-white">Nama Bank</label>
                <select class="form-select" name="bank" id="select_page" onChange="check(this);">
                  <option value="">--Pilih Bank--</option>
                  @foreach($banks as $bank)
                  <option value="{{ $bank['name'] }}">{{ $bank['name'] }}</option>
                  @endforeach
                  <option value="Lainnya">Lainnya</option>
                </select>
            </div>
              <div class="form-group col-sm-4">
                <label for="name" class="form-label text-white">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" name="name" placeholder="Nama Pemilik Rekening">
              </div>
              <div class="form-group col-sm-4">
                <label for="nominal" class="form-label text-white">Nominal</label>
                <input type="text" id="rupiah" class="form-control" name="nominal" placeholder="Masukkan Nominal">
              </div>
              <div class="mb-3" id="other-div" style="display:none;">
                <label for="bank" class="form-label text-white">Nama Bank atau Dompet Digital</label>
                <input id="other-inputs" type="text" class="form-control" name="bank" placeholder="Nama Bank atau Dompet Digital">
            </div>
              <div class="form-group col-sm-20">
                <label for="payment_image" class="form-label text-white">Bukti Transfer</label>
                <input type="hidden" name="oldImage" value="">
                <input type="file" name="payment_image" class="form-control">
              </div>
              <div class="row  align-items-start">
                <div class="col-md-4">
                    <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-block btn-warning text-dark">
                </div>
            </div>
              </div>
           </div>
          </div>
      </div>
      </div>
      </div>
      </div>
    @elseif ($payment->status === 'Rejected')
    <div class="py-4 container">
      <div class="row">
        <div class="col-md-20">
          <div class="card1 mt-3 p-3 g-2">
           <div class="card-header text-warning">
            <b>Form Pembayaran</b>
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
           <div class="card-body mt-3">
            <form action="{{ route('payment.update', $payment->id) }}" method="POST" class="form-profile" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
            <div class="row">
              <div class="form-group col-sm-4">
                <label for="bank" class="form-label text-white">Nama Bank</label>
                <select class="form-select" name="bank" id="select_page" onChange="check(this);">
                  <option value="">--Pilih Bank--</option>
                  @foreach($banks as $bank)
                  <option value="{{ $bank['name'] }}">{{ $bank['name'] }}</option>
                  @endforeach
                  <option value="Lainnya">Lainnya</option>
                </select>
            </div>
              <div class="form-group col-sm-4">
                <label for="name" class="form-label text-white">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" name="name" placeholder="Nama Pemilik Rekening">
              </div>
              <div class="form-group col-sm-4">
                <label for="nominal" class="form-label text-white">Nominal</label>
                <input type="text" id="rupiah" class="form-control" name="nominal" placeholder="Masukkan Nominal">
              </div>
              <div class="mb-3" id="other-div" style="display:none;">
                <label for="bank" class="form-label text-white">Nama Bank atau Dompet Digital</label>
                <input id="other-inputs" type="text" class="form-control" name="bank" placeholder="Nama Bank atau Dompet Digital">
            </div>
              <div class="form-group col-sm-20">
                <label for="payment_image" class="form-label text-white">Bukti Transfer</label>
                <input type="hidden" name="oldImage" value="">
                <input type="file" name="payment_image" class="form-control">
              </div>
              <div class="row  align-items-start">
                <div class="col-md-4">
                    <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-block btn-warning text-dark">
                </div>
            </div>
              </div>
           </div>
          </div>
      </div>
      </div>
      </div>
      </div>
      @elseif($payment->status === "Accepted")
      <div class="py-2 mt-4 text-center text-dark" style="background-color: aqua;" role="alert">
        Pembayaran diverifikasi, silahkan untuk melakukan proses selanjutnya.
      </div>
      @else
      <div class="py-2 mt-4 text-center text-dark" style="background-color: yellow;" role="alert">
        Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya.
      </div>
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