 <!-- nav area start -->
 <nav class="navbar nav navbar-expand-lg fixed">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span class="h2 fw-bold">PPDB TP 2023-2024<i class="h4">SMK Wikrama Bogor</i></span>
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> <i class="fa-solid fa-bars"></i> </span>
        </button>
        <div class="collapse navbar-collapse my-2" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#expart">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{ auth()->user()->nisn }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="{{ route('logout.auth') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                          </form>
                        </li>
                    </li>       
                </ul>
                @else
                <li class="nav-item">
                    <a class="nav-link text-warning" href="/login">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- nav area end -->