@extends('pages.main')

@section('content')
    {{--  Hero Section --}}
    <section class="hero d-flex align-items-center mt-lg-5 mt-sm-0" id="hero" data-scroll-index="0">
        <div class="effect-wrap">
            <i class="fas fa-plus effect effect-1"></i>
            <i class="fas fa-plus effect effect-2"></i>
            <i class="fas fa-circle-notch effect effect-3"></i>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-center order-lg-last">
                    <div class="hero-img">
                        @include('komponen.svg-1')
                    </div>
                </div>
                <div class="col-md-7 order-lg-first">
                    <div class="hero-text">
                        <img class="d-none d-lg-block " src="{{ asset('images/logo-sidawar-nama.png') }}" height="80"
                            alt="">
                        <h1 class="lilitan">Aplikasi Pendataan <span class="text-success">Warga</span></h1>
                        <p class="text-capitalize sora">Lihat Data Warga dan memanipulasinya</p>
                        @guest
                            <a class="btn btn-success" href="/login" role="button">Ayo Mulai</a>
                        @endguest
                        @auth
                            <a class="btn btn-success" href="/dashboard" role="button">Dashboard</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section class="about section-padding bg-success p-5 mt-5" id="fungsi" data-scroll-index="1">
        <div class="section-title text-center mb-3">
            <h2 class="fs-1 text-dark">Fungsi <span>Kami</span></h2>
        </div>
        <div class="container">
            <div class="shape-index d-none d-md-block"></div>
            <div class="spinner"></div>
            <div class="row justify-content-center">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="about-img w-50">
                        @include('komponen.svg-2')
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 mt-5">
                    <div class="section-title">
                        <h2>Si <span>Dawar</span></h2>
                    </div>
                    <div class="about-text">
                        <p class="text-white"> Sebuah aplikasi yang dibuat untuk memudahkan pendataan warga, dengan ini kita
                            dapat mendata
                            dengan lebih mudah dan efisien. Aplikasi ini juga mendukung gerakan GO GREEN karena dapat
                            mengurangi penggunaan kertas. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Fitur Section Start -->
    <section class="fitur section-padding mt-5 text-center" id="fitur">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="text-dark">Fitur <span class="text-success">Aplikasi </span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="cards-fitur col-lg-12 col-md-6 row  ">
                    <div class="card p-3 fitur-item">
                        <h3 class="oswald">CRUD</h3>
                        <span class="fs-2">📝</span>
                        <p class="montserrat">Create(Menambahkan), Read(Menampilkan), Update(Memperbarui), Delete(Menghapus)
                            Data dari banyak
                            warga dan RT</p>
                    </div>
                    <div class="card p-3 fitur-item">
                        <h3 class="oswald">Charts</h3>
                        <span class="fs-1">📊</span>
                        <p class="montserrat">Menampilkan data secara akurat dari tahun ke tahun</p>
                    </div>
                    <div class="card p-3 fitur-item">
                        <h3 class="oswald">Export Dan Import</h3>
                        <span class="fs-1">📄</span>
                        <p class="montserrat">Mengubah data dari database kedalam format excel dan sebaliknya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fitur Section End -->

    {{-- footer --}}
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <section class="footer bg-success">
        <footer class="bg-success text-white text-center text-lg-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Alamat</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                            voluptatem veniam, est atque cumque eum delectus sint!
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Hubungi Kami</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">rw1@gmail.com</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">0821-4781-8921</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Ikuti Kami</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white">ig:rw1jaya</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">fb:rw1uhuy</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white">SMKN4</a>
            </div>
        </footer>
    </section>
@endsection
