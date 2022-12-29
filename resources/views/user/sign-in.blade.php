@extends('layouts.sign')
@section('container')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Masukkan akun PPDB Kamu!</p>
                </div>

                @if (session('LoginError'))
                <script>
                    Swal.fire(
                    'Login Gagal!',
                    'Silahkan Login Kembali!',
                    'error'
                    )
                </script>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">
                  <form role="form" action="{{ route('login.auth') }}" method="post">
                    @csrf
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" autofocus required value="{{ old('email') }}">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('https://1.bp.blogspot.com/-j5geZP0KJak/X0SGdMpL3KI/AAAAAAAAAW8/UrhFZcNlHvsN6phjeZyW-sLwryLXisx0ACLcBGAsYHQ/s6000/DSC07846.JPG')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection
 
