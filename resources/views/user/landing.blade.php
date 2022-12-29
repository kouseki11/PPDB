@extends('layouts.landing')

@section('container')


@if (session('notAllowed'))
<script>
    Swal.fire(
    'Silahkan Login Terlebih Dahulu!',
    '',
    'warning'
    )
</script>
@endif

@if (session('logout'))
<script>
    Swal.fire(
    'Berhasil Logout!',
    '',
    'success'
    )
</script>
@endif

<!-- header area start -->
<section class="header" id="home">
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <div data-aos="zoom-in">
                    <p class="display-3 fw-bold text-white"> We are happy to build  </p>
                    <p class="display-5 fw-bold text-white"> Your Best <i class="text-warning">Skill</i></p>
                </div>
                <p class="text-white my-5">Ayo! segera daftarkan dirimu ke SMK Wikrama dengan cara klik <b>PENDAFTARAN PPDB</b> dibawah ini!
                    <b>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.</p>
                <a href="{{ route('register') }}" class="h2 fw-bold btn btn-warning btn-one px-5 py-2">PENDAFTARAN PPDB</a>
            </div>
        </div>
    </div>
</section>
<!-- header area end -->

<!-- about area start -->
<section class="about" id="about">
    <div class="container my-5 py-5 ">
        <div class="row">
            <div class="col-lg-6 text-start">
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <p class="h5 my-3" style="color: #000080"></p>
                    <p class="h1">ABOUT US</p>
                    <hr class="hr-one m-0">
                    <p class="lh-lg mt-4"> 	
                        SMK Wikrama Bogor didirikan oleh Ir. Itasia Dina Sulvianti dan Dr.H.RP Agus Lelana dibawah naungan Yayasan Prawitama pada tahun 1996 di bekas gudang KUD. Kompetensi keahlian yang pertama dibuka pada saat itu adalah sekretaris dengan jumlah hanya 34 siswa.</p>
                    <a href="#">
                        <p class="h3" style="color: #000080"></p>
                    </a>
                    <a href="#">
                        <p class="h3" style="color: #000080"></p>
                    </a>
                    <a target="blank" href="https://smkwikrama.sch.id/sejarah" class="h3 fw-bold btn btn-warning btn-one px-5 py-2 my-5">Read More</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div data-aos="flip-left">
                    <img src="{{ asset('images/landing/gedung.png') }}" class="img-fluid rounded " alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area end -->
<!-- blog area start -->
<section class="blog" id="expart">
    <div class="container my-5 py-5">
        <div class="row my-5">
            <div class="col-lg-6 mx-auto text-center">
                <div data-aos="zoom-in">
                    <p class="h1">Jurusan</p>
                    <hr class="hr-one m-0 mx-auto">
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div data-aos="fade-right">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/pplg.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Desktop Programming, Web Programming, Mobile Programming, Business Analyst, Database Administration</p>
                        <p class="h3">PPLG</p>
                        <a target="blank" href="https://smkwikrama.sch.id/pplg" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="zoom-in">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/tjkt.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Kompetensi keahlian Teknik Komputer dan Jaringan sudah memiliki sertifikasi internasional seperti CNAP (Cisco Networking Academy Program) dan MCNA (Mikrotik Certified Network Associate).</p>
                        <p class="h3">TJKT</p>
                        <a target="blank" href="https://smkwikrama.sch.id/tjkt" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="fade-left">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/dkv.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Lulusan dapat memiliki kesempatan kerja yang luas dibidang periklanan, production house,radio & televisi, studio foto, percetakan grafis, corporate brand identity, penerbit majalah/Koran, dll.</p>
                        <p class="h3">DKV</p>
                        <a target="blank" href="https://smkwikrama.sch.id/dkv" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div data-aos="fade-right">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/PMN.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Kompetensi keahlian Bisnis Daring dan Pemasaran memiliki kompetensi yang miri dengan program Multimedia dan Perkantoran Lulusan program ini diharuskan mampu membuat foto produk, desain, copy writing, dll.</p>
                        <p class="h3">PMN</p>
                        <a target="blank" href="https://smkwikrama.sch.id/pmn" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="zoom-in">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/mplb.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Kompetensi keahlian Otomatisasi dan Tata Kelola Perkantoran/Administrasi Perkantoran memiliki keunggulan dibidang prestasi peserta didik seperti juara II lomba keterampilan siswa bidang lomba sekretares tingkat provinsi tahun 2016 dan juara I lomba olimpiade sekretaris tingkat nasional tahun 2017.</p>
                        <p class="h3">MPLB</p>
                        <a target="blank" href="https://smkwikrama.sch.id/mplb" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="fade-left">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/tbg.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Siswa jurusan Tata Boga mampu bekerja diberbagai bidang jasa boga seperti restoran hotel, rumah sakit, katering sesuai dengan minat dan bakat yang telah dipelajar.</p>
                        <p class="h3">KLN</p>
                        <a target="blank" href="https://smkwikrama.sch.id/kln" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="fade-left">
                    <div class="t-card text-center">
                        <div class="img-box">
                            <img src="{{ asset('images/landing/hotel.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <p class="my-3 px-3">Siswa jurusan Perhotelan akan mampu bekerja di departemen yang ada di hotel dengan kompetensi yang mereka pelajari.</p>
                        <p class="h3">HTL</p>
                        <a target="blank" href="https://smkwikrama.sch.id/htl" class="h3 fw-bold btn btn-warning btn-one btn-style px-5 py-2 my-4">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog area end -->

<section class="servises" id="services">
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-lg-8 text-center mx-auto">
                <div data-aos="zoom-in">
                    <p class="h1">Testimoni</p>
                    <hr class="hr-one m-0 mx-auto">
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-6">
                <div data-aos="zoom-in-left">
                    <img src="images/funchy4.jpg" class="img-fluid rounded shadow-lg" alt="">
                </div>
            </div>
            <div class="col-lg-6 px-5">
                <div data-aos="zoom-in">
                    <p class="h3 my-5 text-center" style="color: #000080">2000</p>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid icons fa-address-card"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-dark">AKHMAD MUNITO</p>
                            <p class="h6 text-secondary">Maju Terus Wikrama, dengan sekolah di Wikrama saya dibekali ilmu yg sangat bermanfaat dan akhlakul karimah bisa langsung bisa bersaing ke dunia kerja di era modern ini</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-brands icons mt-5 fa-waze"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-secondary mt-5">Administrasi Perkantoran (APK)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5 py-5">
            <div class="col-lg-6 px-5">
                <div data-aos="zoom-in">
                    <p class="h3 my-5 text-center" style="color: #000080">2011</p>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid icons fa-address-card"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-dark">LUTFI HAKIM</p>
                            <p class="h6 text-secondary">TSMK Wikrama bukan hanya menjadikan siswanya untuk masuk ke dunia kerja, melainkan melebihi dari apa yang dibutuhkan di dunia kerja pada umumnya.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-brands icons mt-5 fa-waze"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-secondary mt-5">Rekayasa Perangkat Lunak (RPL)<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-aos="zoom-in-left">
                    <img src="images/Serv-2.jpg" class="img-fluid rounded shadow-lg" alt="">
                </div>
            </div>
        </div>
        <div class="row mt-5 py-5">
            <div class="col-lg-6">
                <div data-aos="zoom-in-left">
                    <img src="images/Serv-1.jpg" class="img-fluid rounded shadow-lg" alt="">
                </div>
            </div>
            <div class="col-lg-6 px-5">
                <div data-aos="zoom-in">
                    <p class="h3 my-5 text-center" style="color: #000080">2016</p>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid icons fa-address-card"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-dark">KAMALUDIN</p>
                            <p class="h6 text-secondary">Menerapkan sistem pembelajaran yang baik, efektif dan berbasis Ti yang sangat memudahkan siswa.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-brands icons mt-5 fa-waze"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="h6 text-secondary mt-5">Rekayasa Perangkat Lunak (RPL)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- servise area end -->

<!-- contact area start -->
<section class="contact" id="contact">
    <div class="container mb-5 py-5">
        <div class="row">
            <div class="col-lg-8 text-center mx-auto">
                <div data-aos="zoom-in">
                    <p class="h5 my-3" style="color: #000080"></p>
                    <p class="h1">CONTACT</p>
                    <hr class="hr-one m-0 mx-auto">
                    <p class="my-3"></p>
                </div>
            </div>
        </div>
         
        
        <form class="contact-form wow fadeInLeft" id="reused_form" action="{{ route('landing.message') }}" method="post">
            @csrf
            <div class="row my-form">
                <div class="col-lg-6">
                    <div class="form-floating mt-4">
                        <input name="name" id="name" type="text" class="form-control" placeholder="Your Name*" required="">
                        <label for="name">Your Name</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Your Email*" required="">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Your Subject.." required="">
                        <label for="subject">Your Subject</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mt-4">
                        <textarea style="height: 150px" name="message" id="message" cols="20" rows="50" class="form-control" placeholder="Your message..."></textarea>
                        <label for="message">Your message</label>
                    </div>
                    <div class="col-lg-6  mt-4">
                        <button type="submit" class="h2 fw-bold btn btn-warning btn-one px-5 py-2"> Send message</button>
                    </div>
                </div>
                 
            </div> 
             
        </form>
    </div>
</section>
<!-- contact atra end -->


<!---->
<div class="go-top active">
    <i class="fa-sharp fa-solid fa-arrow-up"></i>
</div>
<!---->

@endsection